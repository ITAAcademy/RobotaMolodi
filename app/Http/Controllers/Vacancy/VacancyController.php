<?php namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\MainController;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\profOrientation\test1;
use App\Models\profOrientation\UserSession;
use App\Models\Vacancy_City;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\Validator;
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
use App\Models\Resume;
use App\Http\Controllers\UploadFile;
use Illuminate\Support\Facades\File;
use View;
//use Request;

//use Session;
class VacancyController extends Controller
{

    /**
     * Returns vacancy if exists and 500 code if id or vacancy incorrect .
     *
     * @param  int $id
     * @return Vacancy
     */

    public function getVacancy($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $vacancy = Vacancy::find($id);

        if (!isset($vacancy)) {
            abort(404);
        }
        return $vacancy;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Vacancy $vacancy, Guard $auth, Company $company)
    {
        if (Auth::check()) {


            $companies = Company::where('users_id','=',$auth->user()->getAuthIdentifier())->get();
            session_start();

            if (count($companies)!=0)
            {

                $industry = new Industry();
                $industries = $industry->getIndustries();

                $city = new City();
                $cities = $city->getCities();

                $userEmail = User::find($auth->user()->getAuthIdentifier())->email;
                $position = Input::get('position_',0);
                $positions = Vacancy::groupBy('position')->lists('position');

                $currency = new Currency();
                $currencies = $currency->getCurrencies();

                return view('NewVacancy.newVacancy',
                    ['companies' => $companies,
                        'cities' => $cities,
                        'industries' => $industries,
                        'userEmail' => $userEmail,
                        'positions' => $positions,
                        'currencies' => $currencies,
                    ]);
            } else {
                $_SESSION['path'] = 'vacancy.create';

                return redirect()->route('company.create');

            }
        } else {
            return Redirect::to('auth/login');
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index(Guard $auth)
    {
        if (Auth::check()) {

            setcookie('paths', '');

            $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies()->paginate(25);

            if (count($vacancies)==0) {
                $mes = "Зараз у Вас немає вакансій.";
                return  view('vacancy.myVacancies', ['vacancies'=> $vacancies, 'mes'=>$mes]);
            } else {
                $vacancies->sortByDesc('created_at');
                $mes =null;
                return  view('vacancy.myVacancies', ['vacancies'=> $vacancies, 'mes'=>$mes]);
            }

        } else {
            return Redirect::to('auth/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Guard $auth, Company $company, Vacancy $vacancy, Vacancy_City $vacancy_City, Request $request)
    {

        //dd($request);
        if (Auth::check()) {
            Input::flash();

            $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();
            //
            if ($hasCompany) {
                $rules = 'required|min:3';
                $this->validate($request, [
                    'position' => $rules,
                    //'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
                    'salary' => 'required|regex:/[^0]+/|min:1|numeric',
                    'email' => 'required|email',
                    'description' => $rules,
                    'city' => 'required'
                ]);

                $vacancy = $vacancy->fillVacancy(0, $request);


                $vacancy->save();

                $cities = $request['city'];
                $vacancy_City = new Vacancy_City();
                $vacancy_City->FillHole($cities, $vacancy->id);


                return redirect()->route('vacancy.index');
            } else {
                return redirect()->route('company.create');
            }
        } else {
            return Redirect::to('auth/login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id, Guard $auth)
    {
        $resume = null;
        $view = 'vacancy.show';

        $vacancy = $this->getVacancy($id);

        //$resume = 'Зареєструйтесь!';
        $search_boolean='false';
        $userVacation = $vacancy->ReadUser($id);

        $cities = $vacancy->Cities();

        $industry = Industry::find($vacancy->branch);
        $company = Company::find($vacancy->company_id);

        if (Auth::check()) {

            $user = User::find($auth->user()->getAuthIdentifier());
            if ($userVacation->id == $user->id) {
                $view = 'vacancy.showMyVacancy';
            }
            $resume = $auth->user()->GetResumes()->get();
        }


        return view($view)
            ->with('resume', $resume)
            ->with('vacancy', $vacancy)
            ->with('company', $company)
            ->with('user', $userVacation)
            ->with('cities', $cities)
            ->with('industry', $industry)
            ->with('search_boolean', $search_boolean);
    }
//        else{
//        return redirect('auth/login');


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id, Guard $auth)
    {
        if (Auth::check()) {
        $companies = Company::where('users_id','=',$auth->user()->getAuthIdentifier())->get();
        $industry = new Industry();
        $industries = $industry->getIndustries();
        $city = new City();
        $cities = $city->getCities();
        $currency = new Currency();
        $currencies = $currency->getCurrencies();
        $vacancy = $this->getVacancy($id);
        $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

            if (User::find(Company::find(Vacancy::find($vacancy->id)->company_id)->users_id)->id==Auth::id())
        return view('vacancy.edit')
            ->with('vacancy', $vacancy)
            ->with('industries', $industries)
            ->with('companies', $companies)
            ->with('cities', $cities)
            ->with('userEmail', $userEmail)
            ->with('currencies', $currencies);
            else
                abort(403);
        }
        else
            return Redirect::to('auth/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Guard $auth, Company $company, Vacancy $vacancy, Request $request)
    {


        if (Auth::check()) {
            $rules = 'required|min:3';
            $this->validate($request,
                [
                    'position' => $rules,
                    'salary' => 'required|regex:/[^0]+/|min:1|numeric',
                    'email' => 'required|email',
                    //'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
                    'description' => $rules,
                    'city' => 'required'
                ]);

            $vacancy = $vacancy->fillVacancy($id, $request);
            $vacancy->update();
            $vacancy->push();


            $cities = $request['city'];
            $vacancy_City = new Vacancy_City();
            $vacancy_City->ClearHole($vacancy->id);
            $vacancy_City->FillHole($cities, $vacancy->id);

            return redirect('cabinet');
        } else {
            return redirect()->route('company.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (!is_numeric($id)) {
            abort(500);
        }
        if (User::find(Company::find(Vacancy::find($id)->company_id)->users_id)->id==Auth::id()) {
            Vacancy::destroy($id);

            return redirect('cabinet');
        }
        else abort(403);

    }

    //Show response form (take one param "id" vacancy)
    /**
     * @param $id
     * @return mixed
     */
    public function response(Guard $auth, $id, Request $request)
    {
//        if(Auth::check())
//        {
        $vacancy = $this->getVacancy($id);

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

    public function sendFile(Guard $auth, Request $request)
    {
        $user = User::find($auth->user()->getAuthIdentifier());
        $uploadFile = UploadFile::upFile();
        if($uploadFile==null) {
                $error = 'Необхiдний формат файлу: doc, docx, odt, rtf, txt, pdf розмiром до 2 мб.';
                return View::make('errors.uploadFileError', array(
                    'error' => $error
                ));
        }
        Mail::send('emails.vacancyFile', ['user' => $user], function ($message) use ($uploadFile) {
            $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
            $to = User::find($company->users_id)->email;
            $message->to($to, User::find($company->users_id)->name)->subject('Резюме по вакансії '.Vacancy::find(Input::get('id'))->position);
            $message->attach($uploadFile);
        });
        File::delete($uploadFile);
        return view('vacancy/vacancyAnswer');

    }

    public function link(Guard $auth, Request $request)
    {
        $this->validate($request,[
            'Link' => 'url|required'
        ]);

        $link = Input::get('Link');
        $user = User::find($auth->user()->getAuthIdentifier());
        $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $link], function ($message) {
            $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
            $to = User::find($company->users_id)->email;
            $message->to($to, User::find($company->users_id)->name)->subject('Резюме по вакансії '.Vacancy::find(Input::get('id'))->position);
        });


//    $link = $linkModel->fillResume(0,$auth,$request);

        //     $link ->save();

        return view('vacancy/vacancyAnswer');
    }

    public function sendResume(Guard $auth, Request $request)
    {
        $resume = Resume::find(Input::get('resumeId'));
        $user = User::find($auth->user()->getAuthIdentifier());
        Mail::send('emails.vacancyResume', ['user' => $user, 'resume' => $resume], function ($message) {
            $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
            $to = User::find($company->users_id)->email;
            $message->to($to, User::find($company->users_id)->name)->subject('Резюме по вакансії '.Vacancy::find(Input::get('id'))->position);
        });
        return view('vacancy/vacancyAnswer');
    }

    public function showPasteFileForm($id, Guard $auth, Request $request)
    {
        $vacancy = $this->getVacancy($id);
        $user = User::find($auth->user()->getAuthIdentifier());
        return View::make('vacancy.pasteVacancyForm.file', array("vacancy" => $vacancy, "user" => $user));
    }

    public function showPasteLinkForm($id, Guard $auth, Request $request)
    {
        $vacancy = $this->getVacancy($id);
        $user = User::find($auth->user()->getAuthIdentifier());
        return View::make('vacancy.pasteVacancyForm.link', array("vacancy" => $vacancy, "user" => $user));
    }

    public function showPasteResumeForm($id, Guard $auth, Request $request)
    {
        $vacancy = $this->getVacancy($id);
        $user = User::find($auth->user()->getAuthIdentifier());
        $resume = $auth->user()->GetResumes()->get();
        return View::make('vacancy.pasteVacancyForm.resume', array("vacancy" => $vacancy, "user" => $user, "resume" => $resume));
    }

    /**
     * @param City $cityModel
     * @param Vacancy $vacancy
     * @return mixed
     */

}
