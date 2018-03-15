<?php namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\MainController;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\profOrientation\test1;
use App\Models\profOrientation\UserSession;
use App\Models\Rating;
use App\Models\Vacancy_City;
use Illuminate\Support\Facades\Cookie;
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


    private $publishedOptions = ['Недоступно','Доступно всім','Доступно зареєстрованим'];
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
                        'publishedOptions'=> $this->publishedOptions,
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

            $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies()->paginate();

            if (count($vacancies)==0) {
                $mes = "Зараз у Вас немає вакансій.";
                return  view('vacancy.myVacancies', ['vacancies'=> $vacancies, 'mes'=>$mes]);

            } else {
                $vacancies->sortByDesc('created_at');
                $mes =null;
//                return  view('vacancy._vacancy', ['vacancies'=> $vacancies, 'mes'=>$mes]);
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

        if (Auth::check()) {
            Input::flash();
            Validator::extend('minSalary', function ($attribute, $value, $parameters) use ($request){
                if ($value < $request['salary_max'])
                    return true;
                else return false;
            });

            $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();
            //
            if ($hasCompany) {
                $this->validate($request, [
                    'position' => 'required|min:3',
                    //'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
                    'salary' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric|min_salary',
                    'salary_max' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric',
                    'email' => 'required|email',
                    'description' => 'required|string|min:130',
                    'city' => 'required',
                    'Organisation' => 'exists:company,id'
                ]);

                $vacancy = $vacancy->fillVacancy(0, $request);


                $vacancy->save();

                $cities = $request['city'];
                $vacancy_City = new Vacancy_City();
                $vacancy_City->FillHole($cities, $vacancy->id);

                return redirect()->route('cabinet.my_vacancies', ['id' => Auth::id()]);
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
//    public function showVacancies(Request $request){
//        $vacancies = Vacancy::latest('created_at')->paginate();
//
//        if($request->ajax()){
//            return View::make('newDesign.vacancies.vacanciesList', array('vacancies' => $vacancies))->render();
//        }
////        return view('newDesign.vacancies.vacanciesList', compact('vacancies'));
//    }


    public function show($id)
    {
        Cookie::queue('url', 'vacancy/'.$id);
        $view = 'vacancy.show';
        $vacancy = $this->getVacancy($id);
        $cities = $vacancy->Cities();

        $industry = Industry::find($vacancy->branch);
        $company = Company::find($vacancy->company_id);

        if (Auth::check()) {
            if ($vacancy->company->users_id == auth()->user()->id) {
                $view = 'vacancy.showMyVacancy';
            }
        }

        if(!Auth::check() && $vacancy->published != 1) {
            $view ="vacancy.noAccessVacancy";
        }

        $userResumes = null;
        if(Auth::check() && Auth::user()->resumes()->get()->count())
            $userResumes = Auth::user()->resumes()->get();
        return view($view)
            ->with('vacancy', $vacancy)
            ->with('company', $company)
            ->with('cities', $cities)
            ->with('industry', $industry)
            ->with('userResumes', $userResumes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id, Guard $auth)
    {
        if (Auth::check()) {

            $industry = new Industry();
            $industries = $industry->getIndustries();
            $city = new City();
            $cities = $city->getCities();
            $currency = new Currency();
            $currencies = $currency->getCurrencies();

            $vacancy = $this->getVacancy($id);
            $vacancy_City = City::whereIn('id', (Vacancy_City::getVacancyCity($vacancy->id)))->get();

            $companies = Company::where('users_id', '=', $auth->user()->getAuthIdentifier())->get();

            $userEmail = $vacancy->user_email;

            $positions = Vacancy::groupBy('position')->lists('position');

            if (User::find(Company::find(Vacancy::find($vacancy->id)->company_id)->users_id)->id == Auth::id())
                return view('vacancy.edit')
                    ->with('vacancy', $vacancy)
                    ->with('industries', $industries)
                    ->with('companies', $companies)
                    ->with('cities', $cities)
                    ->with('userEmail', $userEmail)
                    ->with('currencies', $currencies)
                    ->with('publishedOptions', $this->publishedOptions)
                    ->with('positions', $positions)
                    ->with('vacancy_City', $vacancy_City);
            else
              return abort(403);
        } else
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

        if (!Vacancy::find($id))
             return  abort(404);

        if (Auth::check()) {

            Validator::extend('minSalary', function ($attribute, $value, $parameters) use ($request){
                if ($value < $request['salary_max'])
                    return true;
                else return false;
            });

            $this->validate($request, [
                'position' => 'required|min:3',
                //'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
                'salary' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric|min_salary',
                'salary_max' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric',
                'email' => 'required|email',
                'description' => 'required|string|min:130',
                'city' => 'required',
                'Organisation' => 'exists:company,id'
            ]);

            $vacancy = $vacancy->fillVacancy($id, $request);

            $vacancy->update();
            $vacancy->push();

            if (Company::find($vacancy->company_id)->users_id != Auth::user()->id && Auth::user()->role == 1)
            {
                Mail::send('emails.notificationEdit', ['messageText' => 'Ваша вакансія була відредагована адміністратором'], function ($message) use ($vacancy) {
                    $to = User::find(Company::find($vacancy->company_id)->users_id)->email;
                    $message->to($to, User::find(Company::find($vacancy->company_id)->users_id)->name)->subject('Ваша вакансія була відредагована адміністратором');
                });

            }

            $cities = $request['city'];
            $vacancy_City = new Vacancy_City();
            $vacancy_City->ClearHole($vacancy->id);
            $vacancy_City->FillHole($cities, $vacancy->id);

            return redirect()->route('cabinet.my_vacancies', ['id' => Auth::id()]);
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

            return redirect()->route('cabinet.my_vacancies');
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

//        return view('vacancies/response')
//                    ->with('vacancies',$vacancies)
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

    public function block(Request $request, Guard $auth)
    {
        if (Auth::check() && Auth::user()->isAdmin() && $request->isMethod('post')) {
            $updateVacancy = Vacancy::find($request['id']);
            $updateVacancy->blocked = true;
            $updateVacancy->blocked_by = Auth::user()->name;
            $updateVacancy->blocked_time = date('Y-m-d');
            $updateVacancy->save();
            Mail::send(
                'emails.notificationEdit',
                ['messageText' => 'Ваша вакансія була заблокована адміністратором'],
                function ($message) use ($updateVacancy) {
                    $to = User::find(Company::find($updateVacancy->company_id)->users_id)->email;
                    $message->to(
                        $to,
                        User::find(Company::find($updateVacancy->company_id)
                            ->users_id)
                            ->name)
                        ->subject('Ваша вакансія була заблокована адміністратором');
            });
        }
        return redirect()->back();
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

    public function updatePablishDate($id){
        $vacancy = Vacancy::find($id);
        $vacancy->touch();
        return $vacancy->updated_at->format('j m Y');
    }

    public function rateVacancy($id, Request $request)
    {
        $vacancy = Vacancy::find($id);
        if(Rating::isValid($request->all())){
            $mark = $request->mark;
            Rating::addRate($mark, $vacancy);
            $countLike = Rating::getLikes($vacancy);
            $countDisLike = Rating::getDislikes($vacancy);
            return ['countLike' => $countLike, 'countDisLike' => $countDisLike];
        } else {
            return ['error' => Rating::getErrorsMessages()->first('mark')];
        }
    }

    public function showVacancies(Request $request)
    {
        $nameFilter  = $request->get('name');
        $valueFilter = $request->get('value');
        // Have to validate ?
        if(isset($nameFilter, $valueFilter))
            $request->session()->flash($nameFilter, $valueFilter);
        return redirect()->route('main.showVacancies');
    }

}
