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
        $forValidationUrl  = [];
        $forValidationDisk = [];
        $forVacancy        = [];
        $forMembers        = [];
        $url  = $request['slides_url'];
        $disk = $request['slides_disk'];
        $vacancies = $request['vacancies'];
        $members = $request['members'];

        if(!empty($url))
            foreach ($url as $key => $value) {
                $forValidationUrl['slides_url.'.$key] = 'required|url';
            }
        if(!empty($disk))
            foreach ($disk as $key => $value) {
                $forValidationDisk['slides_disk.'.$key] = 'required|image';
            }
        if(!empty($members))
        {
            foreach ($members as $memberHash) {
                // $member = Member.new($memberHash);
                // $member->validate();
                $forMembers['members.'.$key.'.name']     = 'required|min:3|max:255';
                $forMembers['members.'.$key.'.position'] = 'required|min:3|max:255';
                $forMembers['members.'.$key.'.avatar']   = 'image';
            }
        } else {
            $forMembers['members.0.name']     = 'required|min:3|max:255';
            $forMembers['members.0.position'] = 'required|min:3|max:255';
            $forMembers['members.0.avatar']   = 'image';
        }

        if(!empty($vacancies))
            foreach ($vacancies as $key => $value) {
                $forVacancy['vacancies.'.$key.'.name']        = 'required|string';
                $forVacancy['vacancies.'.$key.'.description'] = 'required|string';
                $forVacancy['vacancies.'.$key.'.total']       = 'required|integer';
                $forVacancy['vacancies.'.$key.'.free']        = 'required|integer';
                $essentilaSkills  = $value['essential_skills'];
                $personalSkills   = $value['personal_skills'];
                $bePlus           = $value['be_plus'];
                $forYou           = $value['for_you'];
                $responsibilities = $value['responsibilities'];
                if(!empty($essentilaSkills))
                    foreach ($essentilaSkills as $k => $v) {
                        $validationKey = 'vacancies.'.$key.'.essential_skills.'.$k;
                        $forVacancy[$validationKey] = 'required|string';
                    }
                if(!empty($personalSkills))
                    foreach ($personalSkills as $k => $v) {
                        $validationKey = 'vacancies.'.$key.'.personal_skills.'.$k;
                        $forVacancy[$validationKey] = 'required|string';
                    }
                if(!empty($bePlus))
                    foreach ($bePlus as $k => $v) {
                        $validationKey = 'vacancies.'.$key.'.be_plus.'.$k;
                        $forVacancy[$validationKey] = 'required|string';
                    }
                if(!empty($forYou))
                    foreach ($forYou as $k => $v) {
                        $validationKey = 'vacancies.'.$key.'.for_you.'.$k;
                        $forVacancy[$validationKey] = 'required|string';
                    }
                if(!empty($responsibilities))
                    foreach ($responsibilities as $k => $v) {
                        $validationKey = 'vacancies.'.$key.'.responsibilities.'.$k;
                        $forVacancy[$validationKey] = 'required|string';
                    }
            }
        $rules = array_merge(
            $forValidationUrl,
            $forValidationDisk,
            $forVacancy,
            $forMembers,
            Project::validationRules()
        );

        $this->validate($request, $rules);
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

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validateForm($request);

        $project = new Project($request->all());
        $project->slides =  ["/image/layer21.jpg", "/image/layer20.jpg", "/image/layer22.jpg", "/image/layer22.jpg"];
        $project->save();

        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $project->logo = UploadFile::saveImage($image, $this->projectsPath().$project->id."/");
            $project->save();
        }

        $members = $request['members'];
        foreach($members as $member)
        {
            $projectMember = new projectMember($member);
            if($member['avatar'] && $member['avatar']->isValid()) {
                $projectMember->avatar = UploadFile::saveImage($member['avatar'], $this->projectsPath().$project->id."/team/");
            }
            $projectMember->project_id = $project->id;
            $projectMember->save();
        }

        $vacancies = $request['vacancies'];

        foreach ($vacancies as $key => $vacancy) {
            $projectVacancy = new ProjectVacancy($vacancy);
            $projectVacancy->project_id = $project->id;
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
