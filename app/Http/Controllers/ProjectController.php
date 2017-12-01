<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Industry;

class ProjectController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    private function validateForm(Request $request)
    {
        $rules = Project::validationRules();
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

    private function userPath()
    {
        return "/image/projects/".Auth::user()->id."/";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('project.index');
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
        $this->validateForm($request);

        $project = new Project($request->all());
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $project->logo = UploadFile::saveImage($image, $this->userPAth());
        }
        $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
