<?php namespace App\Http\Controllers\Vacancy;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VacancyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index(Company $companies,Guard $guard)
	{
        //dd("asdsada");
        setcookie('paths','');
        $logId = 10;//$guard->user('id');

        $vacancies = Vacancy::all();

       return view('vacancy.myVacancies',['vacancies' => $vacancies] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Vacancy $vacancy,Guard $auth,Company $company)
	{

        $hasCompany = true; $company->hasCompany(array($auth->user())); //заглушка пока не узнаю как присоединится к юзеру
        setcookie('paths','');
        if($hasCompany){
            $logId = 10;//$auth->user('id');                            //заглушка пока не узнаю как присоединится к юзеру
            $countCompany = $company->CountCompany($logId);             //подсчет компаний юзера

            return view('NewVacancy.newVacancy',['companies' => $countCompany]);
        }
        else{
            return redirect()->route('Company.create');

            }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Guard $guard,Company $company,Vacancy $vacancy,Request $request)
	{
        //$dada = Company::find($id);

        $hasCompany = true;//$company->hasCompany(array($guard->user()));       //заглушка пока не узнаю как присоединится к юзеру

        if($hasCompany){
        $rules = 'required|min:3';
            $this->validate($request,[
            'Position' => $rules,
            'Salary' => 'required|min:3|numeric',
            'Description' => $rules
        ]);

        $position = $request['Position'];
        $galuz = $request['Galuz'];
        $organisation = $request['Organisation'];
        $date = $request['Date'];
        $salary = $request['Salary'];
        $city = $request['City'];
        $desription = $request['Description'];

        $vacancyReg = array();
        $vacancyReg['position'] = $position;
        $vacancyReg['galuz'] = $galuz;
        $vacancyReg['organisation'] = $organisation;
        $vacancyReg['date'] = $date;
        $vacancyReg['salary'] = $salary;
        $vacancyReg['city'] = $city;
        $vacancyReg['description'] = $desription;
        //$vacancyReg['created_at'] = timestamps();

        $vacancy->CreateVacancy($vacancyReg);

            $vacancies = Vacancy::all();
            //dd($vacancies);
            return view('vacancy.vacancyMain',['vacancies' => $vacancies] );
        }
        else
        {
            redirect()->route('Company/Company.create');

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
