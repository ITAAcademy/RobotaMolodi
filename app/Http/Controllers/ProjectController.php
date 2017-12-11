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

    private $validationErrors = null;

    private function validateForm(Request $request)
    {
        $isValid = true;
        $project = new Project($request->all());
        $isValid = $project->validate();
        if(!$isValid)
            $this->validationErrors = $project->errors();
        return $isValid;
    }

    private function projectsPath()
    {
        return "/uploads/projects/";
    }

    private function saveMembers($projectId, $members)
    {
        foreach($members as $member)
        {
            $projectMember = new ProjectMember($member);
            if($member['avatar'] && $member['avatar']->isValid()) {
                $projectMember->avatar = UploadFile::saveImage($member['avatar'], $this->projectsPath().$project->id."/team/");
            }
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

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        if(!$this->validateForm($request)){
            return redirect()
                       ->route('project.create')
                       ->withErrors($this->validationErrors)
                       ->withInput();
        }

        $project = new Project($request->all());
        $project->slides =  ["/image/layer21.jpg", "/image/layer20.jpg", "/image/layer22.jpg", "/image/layer22.jpg"];
        $project->save();

        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $project->logo = UploadFile::saveImage($image, $this->projectsPath().$project->id."/");
            $project->save();
        }

        $this->saveMembers($project->id, $request['members']);
        $this->saveVacancies($project->id, $request['vacancies']);

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
        return view('project.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Project $project)
    {
        //
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
