<?php namespace App\Http\Controllers\Vacancy;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use View;

class VacancyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index(Company $companies,Guard $guard)
	{

        setcookie('paths','');

        $vacancies = Vacancy::all();

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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Vacancy $vacancy,Guard $auth,Company $company)
	{
        $user = $auth->user();
        $hasCompany = $company->hasCompany($user->getAuthIdentifier()); //заглушка пока не узнаю как присоединится к юзеру
        setcookie('paths','');
        //dd($hasCompany);
        if($hasCompany){
            $logId = $user->getAuthIdentifier();                                    //заглушка пока не узнаю как присоединится к юзеру
            $countCompany = $company->CountCompany($logId);             //подсчет компаний юзера

            return view('NewVacancy.newVacancy',['companies' => $countCompany]);
        }
        else{
            return redirect()->route('company.create');

            }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Guard $guard,Company $company,Vacancy $vacancy,Request $request)
	{
        //dd($guard->user()->getAuthIdentifier());
        $hasCompany = Company::find($guard->user);//$company->hasCompany($guard->user());       //заглушка пока не узнаю как присоединится к юзеру

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

            $vacancy->save();

            return redirect()->route('vacancy.index');
        }
        else
        {
            return redirect()->route('company.create');

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
