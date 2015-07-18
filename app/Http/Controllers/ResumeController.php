<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateNewResume;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Resume;
use App\Models\City;
use App\Models\Industry;

class ResumeController extends Controller {// Клас по роботі з резюме

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Resume $resumeModel)//Output all resumes
	{
        $resumes = $resumeModel->getResumes(); //Выборка с базы через модель Resumes

        //$resumes = Resume::all();
        //dd($resumes);
		return  view('Resume.myResumes', ['resumes'=> $resumes]);//Пердача данных у в юшку myResumes
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(City $cityModel, Industry $industryModel)// Create new resume
	{
        $cities = $cityModel->getCities();
        $industries = $industryModel->getIndustries();

		return view('Resume.create', ['cities'=> $cities, 'industries'=> $industries]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Resume $resumeModel, CreateNewResume $request)//Save resume in DB
	{
        //dd($request->all());
        $resumeModel->create($request->all());
        return redirect()->route('resumes');
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
		//
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
