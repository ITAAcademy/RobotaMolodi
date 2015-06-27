<?php namespace App\Http\Controllers;


use Validator;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Auth;
use Resources\Views;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//dd($_COOKIE['regCompany']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Company $company)
	{
        return view('Company.regCompany');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Guard $auth,Company $companyModel, Request $request)
	{

        $this->validate($request,[
            'companyName' => 'required|min:3',
        ]);

        $companyName = $request['companyName'];
        $companyEmail = $request['companyEmail'];


        if($companyName!=null)
        {
            $regArray = array();
            $regArray[] = $auth->user();
            $regArray[] = $companyName;
            $regArray[] = $companyEmail;

            $companyModel->createCompany($regArray);

            return redirect()->route('Company.index');
        }
        else
        {
            return view('Company.regCompany');
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
