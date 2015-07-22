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

        $vacancy = new Vacancy();
        $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies();
           //dd($vacancies);
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

         setcookie('paths','');

        if(!empty($hasCompany[0])){
            //$logId = $user->find($auth->user()->                                    //заглушка пока не узнаю как присоединится к юзеру
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

        $position = $request['Position'];
        $branch = $request['branch'];
        $organisation = $request['Organisation'];
        $date = $request['Date'];
        $salary = $request['Salary'];
        $city = $request['City'];
        $desription = $request['Description'];
        $userEmail = $request['user_email'];
        //dd($userEmail);
            $companyId = $company->companyName($organisation);

            $vacancy = new Vacancy();
            $vacancy->position = $position;
            $vacancy->branch = $branch;
            $vacancy->organisation = $organisation;
            $vacancy->date_field = $date;
            $vacancy->salary = $salary;
            $vacancy->city = $city;
            $vacancy->description = $desription;
            $vacancy->company_id = $companyId[0]->id ;
            //$vacancy->user_email = $userEmail;

            $vacancy->save();

            return redirect()->route('cabinet.index');
        }
        else
        {
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
		return view('NewVacancy.edit');
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
