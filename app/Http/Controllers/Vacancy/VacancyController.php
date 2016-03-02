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
            abort(500);
        }

        $vacancy = Vacancy::find($id);

        if (!isset($vacancy)) {
            abort(500);
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

            $hasCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();

            session_start();

            if (!empty($hasCompany[0])) {

                $countCompany = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();             //подсчет компаний юзера

                $industry = new Industry();
                $industries = $industry->getIndustries();

                $city = new City();
                $cities = $city->getCities();

                $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

                return view('NewVacancy.newVacancy',
                    ['companies' => $countCompany,
                        'cities' => $cities,
                        'industries' => $industries,
                        'userEmail' => $userEmail,
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


    public function index(Company $companies, Guard $auth)
    {
        if (Auth::check()) {

            setcookie('paths', '');

            $vacancies = User::find($auth->user()->getAuthIdentifier())->ReadUserVacancies()->paginate(25);

            if (!$vacancies) {
                $vacancies = "Зараз у Вас немає вакансій.";

                return View::make('vacancy.myVacancies')->nest('child', 'vacancy._noVacancy', ['vacancies' => $vacancies]);
            } else {
                $vacancies->sortByDesc('created_at');

                return View::make('vacancy.myVacancies')->nest('child', 'vacancy._vacancy', ['vacancies' => $vacancies]);
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
                    'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
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
            ->with('industry', $industry);
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

        $companies = User::find($auth->user()->getAuthIdentifier())->hasAnyCompany();             //подсчет компаний юзера

        $industry = new Industry();
        $industries = $industry->getIndustries();

        $city = new City();
        $cities = $city->getCities();

        $vacancy = $this->getVacancy($id);

        $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

        return view('vacancy.edit')
            ->with('vacancy', $vacancy)
            ->with('industries', $industries)
            ->with('companies', $companies)
            ->with('cities', $cities)
            ->with('userEmail', $userEmail);
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
                    'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
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

        Vacancy::destroy($id);

        return redirect('cabinet');

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
            if($uploadFile==null)
             return view('errors/uploadFileError');
            Mail::send('emails.vacancyFile', ['user' => $user], function ($message) use ($uploadFile) {
                $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
                $to = $company->company_email;
                $message->to($to, User::find($company->users_id)->name)->subject('Резюме по вакансії '.Vacancy::find(Input::get('id'))->position);
                $message->attach($uploadFile);
            });
            File::delete($uploadFile);
            return view('vacancy/vacancyAnswer');

    }

    public function link(Guard $auth, Request $request)
    {
//        $this->validate($request,[
//            'Link' => 'url|required'
//        ]);
        $link = Input::get('Link');
        $user = User::find($auth->user()->getAuthIdentifier());
        $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $link], function ($message) {
            $company = Company::find(Vacancy::find(Input::get('id'))->company_id);
            $to = $company->company_email;
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
            $to = $company->company_email;
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
    public function sortVacancies(City $cityModel)
    {
        $industries = Industry::orderBy('name')->get();
        if(!$ind = Input::get('industry'))
            $ind = 0;
        else
            switch($ind)
            {
                case 'Торгівля/продаж':
                    $ind = '1';
                    break;
                case 'Інформаційні технології':
                    $ind = '2';
                    break;
                case 'Керівництво/топ-менеджмент':
                    $ind = '3';
                    break;
                case 'Менеджери/керівники середньої ланки':
                    $ind = '4';
                    break;
                case 'Бухгалтерія/банк/фінанси/аудит':
                    $ind = '5';
                    break;
                case 'Офісний персонал/HR':
                    $ind = '6';
                    break;
                case 'Реклама/маркетинг/pr':
                    $ind = '7';
                    break;
                case 'Інженерія/технології':
                    $ind = '8';
                    break;
                case 'Будівництво/архітектура/нерухомість':
                    $ind = '9';
                    break;
                case 'Юриспруденція/страхування/консалтинг':
                    $ind = '10';
                    break;
                case 'Логістика/склад/митниця':
                    $ind = '11';
                    break;
                case 'Транспорт/служба безпеки/охорона':
                    $ind = '12';
                    break;
                case 'Поліграфія/дизайн/оформлення':
                    $ind = '13';
                    break;
                case 'Виробництво/робітничі спеціальності':
                    $ind = '14';
                    break;
                case 'Краса/фітнес/спорт/туризм':
                    $ind = '15';
                    break;
                case 'Мистецтво/розваги/шоу-бізнес':
                    $ind = '16';
                    break;
                case 'Журналістика/редагування/переклади':
                    $ind = '17';
                    break;
                case 'Освіта/наука/виховання':
                    $ind = '18';
                    break;
                case 'Сфера обслуговування/кулінарія/готелі/ресторани':
                    $ind = '19';
                    break;
                case 'Охорона здоров\'я/фармацевтика':
                    $ind = '20';
                    break;
                case 'Сільське господарство/переробка с/г продукції':
                    $ind = '21';
                    break;
                case 'Домашній персонал/різноробочі':
                    $ind = '22';
                    break;
                case 'Громадські організації/політичні партії':
                    $ind = '23';
                    break;
                case 'Екологія/охорона навколишнього середовища':
                    $ind = '24';
                    break;
                case 'Соціальна сфера':
                    $ind = '25';
                    break;
                default:
                    $ind = '666';
            }
        $industry = Input::get('industry_id', (int)$ind);

        $cities = $cityModel->getCities();
        if(!$cit = Input::get('city'))
            $cit = 0;
        else
            switch($cit)
            {
                case 'Уся Україна':
                    $cit = '1';
                    break;
                case 'Вінниця':
                    $cit = '2';
                    break;
                case 'Дніпропетровськ':
                    $cit = '3';
                    break;
                case 'Донецьк':
                    $cit = '4';
                    break;
                case 'Житомир':
                    $cit = '5';
                    break;
                case 'Запоріжжя':
                    $cit = '6';
                    break;
                case 'Івано-Франківськ':
                    $cit = '7';
                    break;
                case 'Київ':
                    $cit = '8';
                    break;
                case 'Кіровоград':
                    $cit = '9';
                    break;
                case 'Луганськ':
                    $cit = '10';
                    break;
                case 'Луцьк':
                    $cit = '11';
                    break;
                case 'Львів':
                    $cit = '12';
                    break;
                case 'Миколаїв':
                    $cit = '13';
                    break;
                case 'Одеса':
                    $cit = '14';
                    break;
                case 'Полтава':
                    $cit = '15';
                    break;
                case 'Рівне':
                    $cit = '16';
                    break;
                case 'Севастополь':
                    $cit = '17';
                    break;
                case 'Сімферополь':
                    $cit = '18';
                    break;
                case 'Суми':
                    $cit = '19';
                    break;
                case 'Тернопіль':
                    $cit = '20';
                    break;
                case 'Ужгород':
                    $cit = '21';
                    break;
                case 'Харків':
                    $cit = '22';
                    break;
                case 'Херсон':
                    $cit = '23';
                    break;
                case 'Хмельницький':
                    $cit = '24';
                    break;
                case 'Черкаси':
                    $cit = '25';
                    break;
                default:
                    $cit = '666';
            }
        $city = Input::get('city_id', (int)$cit);

        if (!$cities->has($city) || !$industries->has($industry))
            abort(500);

        if($city > 0 && $industry < 1)
            $vacancies = City::find($city)->Vacancies()->paginate(25);
        elseif($industry > 0 && $city < 1)
            $vacancies = Vacancy::where('branch', $industry)->paginate(25);
        else
            $vacancies = VacancyController::ShowFilterVacancies($city, $industry);

        /*return Response::json(View::make('main.filter.vacancy',
            array('vacancies' => $vacancies,
                'industries' => $industries,
                'cities' => $cities,
                'city_id'=>$city,
                'industry_id' => $industry)
        )->render());*/

        /*return View::make('main.filter.vacancy',
            array('vacancies' => $vacancies,
                'industries' => $industries,
                'cities' => $cities,
                'city_id'=>$city,
                'industry_id' => $industry)
        )->render();*/

        return View::make('main.filter.filterVacancies', array(
            'vacancies' => $vacancies,
            'industries' => $industries,
            'city_id' => $city,
            'industry_id' => $industry,
            'cities' => $cities));
    }
}
