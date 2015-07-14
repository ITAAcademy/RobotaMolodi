<?php namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Auth;
//use Request;
use App\Http\Requests;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class CompanyController extends Controller  {

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
        $company = ' ';

       // dd($company);
        if(Session::get('company') != '')
        {
            $company = Session::get('company');
        }
        return view('Company.regCompany',['company' => $company]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Guard $auth,Company $companyModel,Request $request)
	{

        $this->validate($request,[
            'companyName' => 'required|min:3',
        ]);

        $companyName = $request['companyName'];
        $companyEmail = $request['companyEmail'];


            $hasCompany = $companyModel->hasCompany(array($companyName));

            if($hasCompany)
            {
                return Redirect::to('Company/create')->with('company', 'Така компанія вже зареєстрована');
            }
        else{
//            $regArray = array();
//            $regArray["id"] = 10;//$auth->user();
//            $regArray["companyName"] = $companyName;
//            $regArray["companyEmail"] = $companyEmail;
            //$resumeModel->create($request->all());
            //dd($request->all());
            $companyModel->create($request->all());
            return Redirect::to('Vacancy/create');
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
