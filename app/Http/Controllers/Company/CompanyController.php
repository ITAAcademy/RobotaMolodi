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
            'company_name' => 'required|min:3',
        ]);
            $user = $auth->user();
            //$companyModel->
            //dd($request['company_name']);
            //dd(Company::all());
            $hasCompany = $companyModel->hasCompany($user->getAuthIdentifier());
            //dd($hasCompany);
            if($hasCompany)
            {
                return Redirect::to('company/create')->with('company', 'Така компанія вже зареєстрована');
            }
            else{

                $companies = $companyModel;
                $companies->company_name = $request['company_name'];
                $companies->company_email = $request['company_email'];
                //dd($auth->user()->getAuthIdentifier());

                $companies->users_id = $auth->user()->getAuthIdentifier();

                $companies->save();
                //$companyModel->create($request->all());
            return Redirect::to('vacancy/create');
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
