<?php namespace App\Http\Controllers\Vacancy;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Industry;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

class VacancyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index(Company $companies,Guard $auth)
	{
        if(Auth::check()){
        setcookie('paths','');



        $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies();



        if(!$vacancies)
        {
            $vacancies = "Зараз у Вас немає вакансій. Створіть";

            return  View::make('vacancy.myVacancies')->nest('child','vacancy._noVacancy',['vacancies' => $vacancies]);
        }
        else
        {
            return  View::make('vacancy.myVacancies')->nest('child','vacancy._vacancy',['vacancies' => $vacancies]);
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
	public function create(Vacancy $vacancy,Guard $auth,Company $company)
	{
        if(Auth::check()){

        $user = new User();

         $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();

            session_start();
         //dd($_COOKIE['path']);
        if(!empty($hasCompany[0])){

            $countCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();             //подсчет компаний юзера

            $industry = new Industry();
            $industries = $industry->getIndustries();

            $city = new City();
            $cities = $city->getCities();

            $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

            return view('NewVacancy.newVacancy',
                ['companies' => $countCompany,
                'cities'=> $cities,
                'industries' => $industries,
                'userEmail' => $userEmail,
                ]);
        }
        else{
            $_SESSION['path'] ='vacancy.create';

            return redirect()->route('company.create');

            }
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
	public function store(Guard $auth,Company $company,Vacancy $vacancy,Request $request)
	{
        if(Auth::check()){

        $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();

        if($hasCompany){
        $rules = 'required|min:3';
            $this->validate($request,[
            'Position' => $rules,
            'Salary' => 'required|min:3|numeric',
            'Description' => $rules
        ]);

        $vacancy = $vacancy->fillVacancy(0,$auth,$company,$request);



            $vacancy->save();

            return redirect()->route('cabinet.index');
        }
        else
        {
            //setcookie('path',"vacancy.create");
            return redirect()->route('company.create');
        }

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

        $vacancy = Vacancy::find($id);

        $user = User::find($auth->user()->getAuthIdentifier());

        $company = new Company();
        $company_name = $company->companyName($vacancy->organisation);

        return view('vacancy.show')
            ->with('vacancy',$vacancy)
            ->with('company_name',$company_name[0])
            ->with('user',$user);

    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,Guard $auth)
	{

        $companies = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();             //подсчет компаний юзера

        $industry = new Industry();
        $industries = $industry->getIndustries();

        $city = new City();
        $cities = $city->getCities();

        $vacancy = Vacancy::find($id);

        $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

        return view('vacancy.edit')
            ->with('vacancy',$vacancy)
            ->with('industries',$industries)
            ->with('companies',$companies)
            ->with('cities',$cities)
            ->with('userEmail',$userEmail);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Guard $auth,Company $company,Vacancy $vacancy,Request $request)
	{

        if(Auth::check()) {
            $rules = 'required|min:3';
            $this->validate($request, [
                'Position' => $rules,
                'Salary' => 'required|min:3|numeric',
                'Description' => $rules
            ]);

            $vacancy = $vacancy->fillVacancy($id,$auth, $company, $request);

            $vacancy->update();
            $vacancy->push();
            return redirect('cabinet');
        }
        else
        {
            return redirect()->route('company.create');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Vacancy::destroy($id);

        return redirect('cabinet');

	}

    public function response($id)
    {
        $vacancy = Vacancy::find($id);

        return view('vacancy/response')->with('vacancy',$vacancy);
    }

}
