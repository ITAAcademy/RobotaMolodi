<?php namespace App\Http\Controllers\Vacancy;


use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Mail;
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

        //dd(Vacancy::where('branch','1')->get());
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
        Input::flash();

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

            return redirect()->route('vacancy.index');
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
	public function show($id,Guard $auth)
	{

        $view = 'vacancy.show';

        $vacancy = Vacancy::find($id);

        $userVacation = $vacancy->ReadUser($id);

        $user = new User();
        if(Auth::check())
        {

            $user = User::find($auth->user()->getAuthIdentifier());
            if($userVacation->id == $user->id)
            {
                $view = 'vacancy.showMyVacancy';

            }
        }

        $company = new Company();
        $company_name = $company->companyName($vacancy->organisation);
        //dd($view);
        return view($view)
            ->with('vacancy',$vacancy)
            ->with('company_name',$company_name)
            ->with('user',$userVacation);

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

    //Show response form (take one param "id" vacancy)
    /**
     * @param $id
     * @return mixed
     */
    public function response(Guard $auth,$id)
    {
        if(Auth::check())
        {
        $vacancy = Vacancy::find($id);

        $company = $vacancy->ReadCompany();

        $user = User::find($auth->user()->getAuthIdentifier());

        $userVacation = $company->ReadUser();

        return view('vacancy/response')
                    ->with('vacancy',$vacancy)
                    ->with('user',$user)
                    ->with('userVacation',$userVacation);
        }
        else
        {
            return Redirect::to('auth/login');
        }
    }

    //Send file in employer (takes one param "id" vacancy)
    public function sendFile(Guard $auth,Request $request)
    {

        $id = $request['id'];
        $vacancy = Vacancy::find($id);
        $company = $vacancy->ReadCompany();

        $user = User::find($auth->user()->getAuthIdentifier());

        Mail::send('vacancy.mail', ['user' => $user], function($message)
        {
            $to = Input::get('emailAddressee');
            $from = Input::get('email');
            $pathToFile = $_FILES['Load']['tmp_name'];

            $message->from($from);
            $message->to($to, 'John Smith')->subject('Welcome!');
            $message->attach($pathToFile);
        });



    }

    public function link(Guard $auth,Request $request)
    {
        $link = Input::get('Link');

        $user = User::find($auth->user()->getAuthIdentifier());

        Mail::send('vacancy.mail', ['user' => $user,'link'=>$link], function($message)
        {
            $to = Input::get('emailAddressee');
            $from = Input::get('email');
            $link = Input::get('Link');

            $message->from($from);
            $message->to($to, 'John Smith')->subject($link);

        });
    }
}
