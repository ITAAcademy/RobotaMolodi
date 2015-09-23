<?php namespace App\Http\Controllers\Company;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use Illuminate\Contracts\Auth\Guard;
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
	public function index(Guard $auth)
	{
        if(Auth::check())
        {

            $companies = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();

            if(empty($companies[0]))
            {

                $companies = "Зараз у Вас немає компаній. Створіть";

                return  View::make('Company.myCompanies')->nest('child','Company._noCompany',['companies' => $companies]);
            }
            else
            {
                
                return  View::make('Company.myCompanies')->nest('child','Company._company',['companies' => $companies]);
            }

        }
        else
        {
            return Redirect::to('auth/login');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Company $company)
	{
        if(Auth::check())
        {

            $company = ' ';


        if(Session::get('company') != '')
        {
            $company = Session::get('company');
        }
        return view('Company.regCompany',['company' => $company]);

        }
        else
        {
        return Redirect::to('auth/login');
        }

}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Guard $auth,Company $companyModel,Request $request)
	{

        if(Auth::check())
        {

        $this->validate($request,[
            'company_name' => 'required|min:3',
            'company_link' => 'url'
        ]);
            $user = $auth->user();

                $company_link = $request['company_link'];
                $company_name = $request['company_name'];
                $user_id = $user->getAuthIdentifier();


                $companies = new Company();
                $companies->users_id = $user_id;
                $companies->company_name = $company_name;
                $companies->company_email = $company_link;


                $companies->save();

            session_start();

            if(isset ($_SESSION['path']))
            {


                $path = $_SESSION['path'];
                session_unset();
            }
            else
            {
                
                $path = 'company.index';
            }
            return redirect()->route($path);
        }
        else
        {
            return Redirect::to('auth/login');
        }

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,Guard $auth)
	{
        $company = Company::find($id);

        return view('Company.show')
            ->with('company',$company);

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

        $company = Company::find($id);

        return view('Company.edit')->with('company',$company);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{

        $this->validate($request,[
            'company_name' => 'required|min:3',
            'company_link' => 'url'
        ]);

        $company_name = $request['company_name'];
        $company_email = $request['company_link'];

        $company = Company::find($id);

        $company->company_name = $company_name;
        $company->company_email = $company_email;

        $company->save();
        $company->push();

        return redirect('cabinet');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Company::destroy($id);

        return redirect('cabinet');

	}


}
