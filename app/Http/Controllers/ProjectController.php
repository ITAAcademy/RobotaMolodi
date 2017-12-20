<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\ProjectVacancy;
use App\Models\ProjectVacancyGroup;
use App\Models\ProjectVacancyOption;
use App\Models\Industry;
use App\Lib\CompositeProject;
use App\Lib\Leaf;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('owner:project',  ['only' => ['edit', 'update', 'destroy']]);
    }

    private function buildEmptyComposite()
    {
        $project = new Project();

        $root    = new CompositeProject($project);
        $members = collect();
        $member = new ProjectMember();
        $leaf   = new Leaf($member);
        $members->push($leaf);

        $vacancies = collect();
        $vacancy = new ProjectVacancy();
        $vacancyRoot = new CompositeProject($vacancy);
        $colectOptions = collect();
            foreach($vacancy->getGroup() as $key => $value){
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $value
                ]));
                $option = new ProjectVacancyOption(['value' => '']);
                $c->add('values', collect([new Leaf($option)]));
                $colectOptions->push($c);
            }
        $vacancyRoot->add('options', $colectOptions);
        $vacancies->push($vacancyRoot);

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;
    }
    private function buildCompositeID($project)
    {
        $root    = new CompositeProject($project);
        $membersRaw = $project->members;
        $members = collect();
        foreach($membersRaw as $m)
            $members->push(new Leaf($m));

        $vacanciesRaw = $project->vacancies;
        $vacancies = collect();
        foreach($vacanciesRaw as $vacancy){
            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();
            foreach($vacancy->getGroup() as $key => $value){
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $value
                ]));
                $o = collect();
                $optionsRaw = $vacancy->getOptions($key);
                foreach($optionsRaw as $opt){
                    $o->push(new Leaf($opt));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;
    }

    private function projectsPath()
    {
        return "/uploads/projects/";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [];

        $companies = Auth::user()->companies->pluck('company_name', 'id');
        if($companies->isEmpty())
            return redirect()->route('company.create');

        $data['companies'] = $companies;

        $project = new Project();
        $data['project'] = $project;

        $industries = Industry::all()->pluck('name', 'id');
        $data['industries'] = $industries;

        $data['root'] = $this->buildEmptyComposite()->toArray();

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $project = new Project($request->all());
        $root    = new CompositeProject($project);

        $members = collect();
        $membersHash = $request['members'];
        foreach($membersHash as $memberHash){
            $m = new ProjectMember($memberHash);
            $members->push(new Leaf($m));
        }

        $vacancies = collect();
        $vacanciesHash = $request['vacancies'];
        foreach($vacanciesHash as $vacancyHash){
            $vacancy = new ProjectVacancy($vacancyHash);
            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();

            foreach($vacancyHash['options'] as $key => $optionsHash)
            {
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $vacancy->getGroup($key)
                ]));
                $o = collect();
                foreach($optionsHash as $optHash){
                    $pvo = new ProjectVacancyOption($optHash);
                    $pvo->group_id = $key;
                    $o->push(new Leaf($pvo));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);

        if(!$root->isValid()) {
            $data = [];
            $data['companies']  = Auth::user()
                ->companies
                ->pluck('company_name', 'id');
            $data['project']    = $project;
            $data['industries'] = Industry::all()->pluck('name', 'id');
            $data['root'] = $root->toArray();
            return view('project.create', $data);
        }
        $root->save();
        dd($root);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Project $project)
    {
        $data = [];
        $data['companies']  = Auth::user()
            ->companies
            ->pluck('company_name', 'id');
        $data['project']    = $project;
        $data['industries'] = Industry::all()->pluck('name', 'id');
        $root = $this->buildCompositeID($project);
        $data['root'] = $root->toArray();

        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        $queryDelete = collect();
        $project->fill($request->all());
        $root    = new CompositeProject($project);
        $members = collect();
        $membersHash = $request['members'];

        foreach($membersHash as $memberHash){
            $m = null;
            if(is_numeric($memberHash['id']))
            {
                $m = ProjectMember::find($memberHash['id']);
                if($m)
                {
                    if($m->project_id == $project->id)
                    {
                        if($memberHash['destroy'] == true)
                        {
                            $queryDelete->push($m);
                            continue;
                        }
                        $m->fill($memberHash);
                    }
                }
            } else {
                $m = new ProjectMember($memberHash);
            }
            $members->push(new Leaf($m));
        }

        $vacancies = collect();
        $vacanciesHash = $request['vacancies'];
        foreach($vacanciesHash as $vacancyHash){
            $vacancy = null;
            if(is_numeric($vacancyHash['id']))
            {
                $vacancy = ProjectVacancy::find($vacancyHash['id']);
                if($vacancy)
                {
                    if($vacancy->project_id == $project->id)
                    {
                        if($vacancyHash['destroy'] == true)
                        {
                            $queryDelete->push($vacancy);
                            continue;
                        }
                        $vacancy->fill($vacancyHash);
                    }
                }
            } else {
                $vacancy = new ProjectVacancy($vacancyHash);
            }

            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();

            foreach($vacancyHash['options'] as $key => $optionsHash)
            {
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $vacancy->getGroup($key)
                ]));
                $o = collect();
                foreach($optionsHash as $optHash){
                    $pvo = null;
                    if(is_numeric($optHash['id']))
                    {
                        $pvo = ProjectVacancyOption::find($optHash['id']);
                        if($pvo)
                        {
                            if($pvo->vacancy_id == $vacancy->id)
                            {
                                if($optHash['destroy'] == true)
                                {
                                    $queryDelete->push($pvo);
                                    continue;
                                }
                                $pvo->fill($optHash);
                            }
                        }
                    } else {
                        $pvo = new ProjectVacancyOption($optHash);
                    }
                    $pvo->group_id = $key;
                    $o->push(new Leaf($pvo));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        if(!$root->isValid()) {
            $data = [];
            $data['companies']  = Auth::user()
                ->companies
                ->pluck('company_name', 'id');
            $data['project']    = $project;
            $data['industries'] = Industry::all()->pluck('name', 'id');
            $data['root'] = $root->toArray();
            return view('project.edit', $data);
        }
        $root->save();
        $queryDelete->each(function($item, $key){
            $item->delete();
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
