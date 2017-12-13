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
use App\Models\ProjectVacancyOption;
use App\Models\Industry;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('owner:project',  ['only' => ['edit', 'update', 'destroy']]);
    }

    private function validateForm(Request $request)
    {
        $data = [];
        $isValid = true;
        $project = new Project($request->all());
        $isValid = $project->validate();
        $data['project'] = $project;
        $memberController = new ProjectMemberController();
        $members = $memberController->makeMembers($request['members']);
        $isValid = $isValid && $memberController->isValid();

        $data['members'] = $members;
        $data['isValid'] = $isValid;

        return $data;
    }

    private function projectsPath()
    {
        return "/uploads/projects/";
    }

    private function saveMembers($projectId, $members)
    {
        foreach($members as $projectMember)
        {
            $projectMember->project_id = $projectId;
            $projectMember->save();
        }
    }

    private function saveVacancies($projectId, $vacancies)
    {

        foreach ($vacancies as $key => $vacancy) {
            $projectVacancy = new ProjectVacancy($vacancy);
            $projectVacancy->project_id = $projectId;
            $projectVacancy->save();

            $essentilaSkills  = $vacancy['essential_skills'];
            $personalSkills   = $vacancy['personal_skills'];
            $bePlus           = $vacancy['be_plus'];
            $forYou           = $vacancy['for_you'];
            $responsibilities = $vacancy['responsibilities'];

            $data = null;
            if(!empty($essentilaSkills))
                foreach ($essentilaSkills as $v) {
                    $tmp = null;
                    $tmp['vacancy_id'] = $projectVacancy->id;
                    $tmp['group_id']   = \App\Models\ProjectVacancyOption::ESSENTIALSKILLS;
                    $tmp['value']      = $v;
                    $data[] = $tmp;
                }
            if(!empty($personalSkills))
                foreach ($personalSkills as $v) {
                    $tmp = null;
                    $tmp['vacancy_id'] = $projectVacancy->id;
                    $tmp['group_id']   = \App\Models\ProjectVacancyOption::PERSONALSKILLS;
                    $tmp['value']      = $v;
                    $data[] = $tmp;
                }
            if(!empty($bePlus))
                foreach ($bePlus as $v) {
                    $tmp = null;
                    $tmp['vacancy_id'] = $projectVacancy->id;
                    $tmp['group_id']   = \App\Models\ProjectVacancyOption::BEPLUS;
                    $tmp['value']      = $v;
                    $data[] = $tmp;
                }
            if(!empty($forYou))
                foreach ($forYou as $v) {
                    $tmp = null;
                    $tmp['vacancy_id'] = $projectVacancy->id;
                    $tmp['group_id']   = \App\Models\ProjectVacancyOption::FORYOU;
                    $tmp['value']      = $v;
                    $data[] = $tmp;
                }
            if(!empty($responsibilities))
                foreach ($responsibilities as $v) {
                    $tmp = null;
                    $tmp['vacancy_id'] = $projectVacancy->id;
                    $tmp['group_id']   = \App\Models\ProjectVacancyOption::RESPONSIBILITIES;
                    $tmp['value']      = $v;
                    $data[] = $tmp;
                }
            foreach ($data as $key => $value) {
                \App\Models\ProjectVacancyOption::create($value);
            }
        }
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

        $member = new ProjectMember();
        $data['members'] = collect([$member]);

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->validateForm($request);
        if(!$result['isValid']){
            $data = [];

            $companies = Auth::user()->companies->pluck('company_name', 'id');
            if($companies->isEmpty())
                return redirect()->route('company.create');

            $industries = Industry::all()->pluck('name', 'id');
            $data['industries'] = $industries;
            $data['companies']  = $companies;
            $data['project']    = $result['project'];
            $data['members']    = $result['members'];

            return view('project.create', $data);
        }
        // dd('Validation was successfull',$request->all());
        $project = $result['project'];
        $project->save();

        // if($request->hasFile('logo')) {
        //     $image = $request->file('logo');
        //     $project->logo = UploadFile::saveImage($image, $this->projectsPath().$project->id."/");
        //     $project->save();
        // }

        $this->saveMembers($project->id, $result['members']);
        // $this->saveVacancies($project->id, $request['vacancies']);

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
        $data['members'] = collect($project->members);
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
        $isValid = true;
        $project->fill($request->all());
        $isValid = $isValid && $project->validate();

        $memberController = new ProjectMemberController();
        $members = $memberController->fillMembers($request['members'], $project->id);
        $isValid = $isValid && $memberController->isValid();

        if($isValid)
        {
            $project->save();
            foreach($members as $m)
            {
                $m->save();
            }
        }
        dd('End', $isValid);
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
