<?php namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\MainController;
use App\Http\Requests;
use App\Models\profOrientation\test1;
use App\Models\profOrientation\UserSession;
use App\Models\Vacancy_City;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

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
use Illuminate\Support\Facades\Response;
use View;

//use Session;
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

        $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies()->paginate(25);

        if(!$vacancies)
        {
            $vacancies = "Зараз у Вас немає вакансій.";

            return  View::make('vacancy.myVacancies')->nest('child','vacancy._noVacancy',['vacancies' => $vacancies]);
        }
        else
        {
            $vacancies->sortByDesc('created_at');

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
	public function store(Guard $auth,Company $company,Vacancy $vacancy,Vacancy_City $vacancy_City,Request $request)
	{

//        dd($request->all());
        if(Auth::check()){
        Input::flash();

        $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();
        //
        if($hasCompany)
        {
        $rules = 'required|min:3';
            $this->validate($request,[
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:1|numeric',
            'email' => 'required|email',
            'description' => $rules,
            'city' => 'required'
        ]);

        $vacancy = $vacancy->fillVacancy(0,$request);



            $vacancy->save();

            $cities = $request['city'];
            $vacancy_City = new Vacancy_City();
            $vacancy_City->FillHole($cities,$vacancy->id);


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

        $cities = $vacancy->Cities();

        $industry = Industry::find($vacancy->branch);
       if(Auth::check()) {

           $user = User::find($auth->user()->getAuthIdentifier());
           if ($userVacation->id == $user->id) {
               $view = 'vacancy.showMyVacancy';

           }
           $resume = $auth->user()->GetResumes()->get();
           $company = Company::find($vacancy->company_id);
           return view($view)
               ->with('resume',$resume)
               ->with('vacancy',$vacancy)
               ->with('company',$company)
               ->with('user',$userVacation)
               ->with('cities',$cities)
               ->with('industry',$industry);
       }
       else{

           $company = Company::find($vacancy->company_id);

        return view($view)
            ->with('vacancy',$vacancy)
            ->with('company',$company)
            ->with('user',$userVacation)
            ->with('cities',$cities)
           ->with('industry',$industry);}
//        else{
//        return redirect('auth/login');
//    }
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
            $this->validate($request,
            [
                'position' => $rules,
                'salary' => 'required|regex:/[^0]+/|min:1|numeric',
                'email' => 'required|email',
                'description' => $rules,
                'city' => 'required'
            ]);

            $vacancy = $vacancy->fillVacancy($id, $request);

            $vacancy->update();
            $vacancy->push();



            $cities = $request['city'];
            $vacancy_City = new Vacancy_City();
            $vacancy_City->ClearHole($vacancy->id);
            $vacancy_City->FillHole($cities,$vacancy->id);

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
    public function response(Guard $auth,$id,Request $request)
    {
//        if(Auth::check())
//        {
        $vacancy = Vacancy::find($id);

        $company = $vacancy->ReadCompany();

        $user = User::find($auth->user()->getAuthIdentifier());

        $userVacation = $company->ReadUser();

//        return view('vacancy/response')
//                    ->with('vacancy',$vacancy)
//                    ->with('user',$user)
//                    ->with('userVacation',$userVacation);
//        }
//        else
//        {
//            return Redirect::to('auth/login');
//        }
        return view('vacancy/vacancyAnswer');
    }

    //Send file in employer (takes one param "id" vacancy)
    public function sendFile(Guard $auth,Request $request)
    {

        $id = $request['id'];
        $vacancy = Vacancy::find($id);
        $company = $vacancy->ReadCompany();

        $user = User::find($auth->user()->getAuthIdentifier());

        $this->validate($request,
            [
                'Load' => 'mimes:doc,docx,odt,rtf,txt,pdf',
                'Load' => 'required',
            ]);

        Mail::send('vacancy.mail', ['user' => $user], function($message)
        {
            $to = Input::get('emailAddressee');
            $from = Input::get('email');
            $pathToFile = $_FILES['Load']['tmp_name'];

            $message->from($from);
            $message->to($to, 'John Smith')->subject('Welcome!');
           // $message->attach($pathToFile);
        });

        return view('vacancy/vacancyAnswer');
    }

    public function link(Guard $auth,Request $request)
    {
      $this->validate($request,[
          'Link' => 'url|required'
       ]);

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


//    $link = $linkModel->fillResume(0,$auth,$request);

   //     $link ->save();

        return view('vacancy/vacancyAnswer');
    }
}
