<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Industry;

class ProjectController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    private function validateForm(Request $request)
    {
        $forValidationUrl  = [];
        $forValidationDisk = [];
        $forVacancy        = [];
        $url  = $request['slides_url'];
        $disk = $request['slides_disk'];
        $vacancies = $request['vacancies'];

        if(!empty($url))
            foreach ($url as $key => $value) {
                $forValidationUrl['slides_url.'.$key] = 'required|url';
            }
        if(!empty($disk))
            foreach ($disk as $key => $value) {
                $forValidationDisk['slides_disk.'.$key] = 'required|image';
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
            Project::validationRules(),
            ProjectMember::validationRules()
        );

        $this->validate($request, $rules);
    }

    private function prepareToSelect2($array, $option, $value)
    {
        $columnOption = array_column($array, $option);
        $columnValue = array_column($array, $value);
        return array_combine($columnOption, $columnValue);
    }

    private function isOwner($project){
        if(Auth::id() ===  $project->company->user->id)
            return true;
        else
            return false;
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

        $companies = Auth::user()->companies;
        if($companies->isEmpty())
            return redirect()->route('company.create');

        $data['companies'] = $this->prepareToSelect2($companies->toArray(), 'id', 'company_name');

        $project = new Project();
        $data['project'] = $project;

        $industries = Industry::all(['id','name']);
        $data['industries'] = $this->prepareToSelect2($industries->toArray(), 'id', 'name');

        return view('project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        Validator::extend('member', function($attribute, $value, $parameters, $validator) {
            $isValid = true;
            foreach($value as $v){
                $validation = Validator::make($v, [
                    'name' => 'required|min:3|max:255',
                    'position' => 'required|min:3|max:255',
                    'avatar' => 'image',
                ]);
                $isValid = $isValid && !$validation->fails();
            }
            return $isValid;
        });

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

             \App\Models\ProjectVacancyOption::create($data);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = [];

        $project = Project::find($id);

        if($project)
            $data['project'] = $project;
        else
            return abort(404);

        $data['members']  = $project->members;
        $data['slides']   = $project->slides;

        return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [];

        $project = Project::find($id);
        if($project)
            $data['project'] = $project;
        else
            return abort(404);

        if(!$this->isOwner($project))
           return abort(403);

        $companies = Auth::user()->companies;

        $data['companies'] = $this->prepareToSelect2($companies->toArray(), 'id', 'company_name');

        $industries = Industry::all(['id','name']);
        $data['industries'] = $this->prepareToSelect2($industries->toArray(), 'id', 'name');

        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
