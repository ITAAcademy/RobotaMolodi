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
use App\Lib\BuilderCompositeProject;
use App\Lib\Leaf;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('owner:project', ['only' => ['edit', 'update', 'destroy']]);
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
        if ($companies->isEmpty())
            return redirect()->route('company.create');

        $data['companies'] = $companies;

        $project = new Project();
        $data['project'] = $project;

        $industries = Industry::all()->pluck('name', 'id');
        $data['industries'] = $industries;

        $builder = new BuilderCompositeProject();

        $root = $builder->buildEmpty();
        $data['root'] = $root->toArray();

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $builder = new BuilderCompositeProject();
        $root = $builder->buildStore($request);
        $project = $root->getRoot();
        if (!$root->isValid()) {
            $data = [];
            $data['companies'] = Auth::user()
                ->companies
                ->pluck('company_name', 'id');
            $data['project'] = $project;
            $data['industries'] = Industry::all()->pluck('name', 'id');
            $data['root'] = $root->toArray();
            return view('project.create', $data);
        }
        $root->save();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Project $project)
    {
        $data = [];
        $data['companies'] = Auth::user()
            ->companies
            ->pluck('company_name', 'id');
        $data['project'] = $project;
        $data['industries'] = Industry::all()->pluck('name', 'id');
        $builder = new BuilderCompositeProject();
        $root = $builder->buildSpecific($project);
        $data['root'] = $root->toArray();

        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        $builder = new BuilderCompositeProject();
        $root = $builder->buildUpdate($request, $project);

        if (!$root->isValid()) {
            $data = [];
            $data['companies'] = Auth::user()
                ->companies
                ->pluck('company_name', 'id');
            $data['project'] = $project;
            $data['industries'] = Industry::all()->pluck('name', 'id');
            $data['root'] = $root->toArray();
            return view('project.edit', $data);
        }
        $root->save();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
