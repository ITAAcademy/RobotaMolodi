<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateNewResume;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Response;
use App\Models\Resume;
use App\Models\City;
use App\Models\Industry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Tests\DataCollector\DumpDataCollectorTest;
use View;
use Illuminate\Support\Facades\Mail;

class ResumeController extends Controller {// Клас по роботі з резюме

    /**
     * Returns resume if exists and 500 code if id or resume incorrect .
     *
     * @param  int  $id
     * @return Resume
     */

    private function getResume($id)
    {
        if (!is_numeric($id))
        {
            abort(500);
        }

        $resume = Resume::find($id);
        if(!isset($resume))
        {
            abort(500);
        }
        return $resume;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    private $http;
	public function index(Resume $resumeModel,Guard $auth)//Output all resumes
	{
        $resumes = User::find($auth->user()->getAuthIdentifier())->GetResumes()->paginate(25);

        return  view('Resume.myResumes', ['resumes'=> $resumes]);//Пердача данных у в юшку myResumes
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(City $cityModel, Guard $auth, Industry $industryModel)// Create new resume
	{
        $this->http=$_SERVER['HTTP_REFERER'];

        if(Auth::check()){
            $cities = $cityModel->getCities();
            $industries = $industryModel->getIndustries();
            $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

            return view('Resume.create', ['cities'=> $cities, 'industries'=> $industries, 'userEmail' => $userEmail,]);
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
	public function store(Resume $resumeModel, Request $request,Guard $auth)//Save resume in DB
	{
        Input::flush();

        $rules = 'required|min:3';
        $this->validate($request,[
            'name_u' => 'required|min:3|regex:/[a-zA-Zа-яА-Я]/',
            'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:1|numeric',
            'description' => $rules,
            'city' => 'required'
        ]);


        $file = $_FILES['loadResume'];//$request->file('loadResume');

        $resume = $resumeModel->fillResume(0,$auth,$request);

        $resume->save();


        return redirect()->to ( $this->http);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    /////////////////////////////!!!!!!!!!!!!!!!DO DIS!!!!!!!!!!!!!!!!!!!!!!!!//////////////////////////////////
	public function show($id,Guard $auth)
	{
        $view = 'Resume.show';

        $resume = $this->getResume($id);

        $userResume = $resume->ReadUser($id);

        $city = City::find($resume->city);

        $user = auth()->user();
        if(Auth::check())
        {
        if($user->id == $userResume->id)
        {
            $view = "Resume.showMyResume";
        }
        }

        return view($view)
            ->with('resume',$resume)
            ->with('city',$city);


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,City $city,Industry $industry)
	{
        if(Auth::check())
        {
            $resume = $this->getResume($id);
            $cities = $city->getCities();
            $industries = $industry->getIndustries();


            return view('Resume.edit')
                        ->with('resume',$resume)
                        ->with('cities',$cities)
                        ->with('industries',$industries);
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        public function update($id,Request $request,Resume $resume,Guard $auth)
    {
        $rules = 'required|min:3';
        $this->validate($request,[
            'name_u' => 'required|min:3|regex:/[a-zA-Zа-яА-Я]/',
            'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:1|numeric',
            'description' => $rules,
            'city' => 'required'
        ]);

        $updateResume = $resume->fillResume($id,$auth,$request);

        $updateResume->push();

        $updateResume->save();

        return redirect()->route('cabinet.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(!is_numeric($id))
        {
            abort(500);
        }

		Resume::destroy($id);

        return redirect()->route('cabinet.index');
        //$resume->destroy();
	}
    public function send_message(Guard $auth,Request $request)
    {

        if (Auth::check()) {
            $resumeId = $request->segment(2);
            if ($request->isMethod('POST')) {

                $this->validate($request, [
                    'name_u' => 'required',
                    'description' => 'required',
                ]);

                Mail::send('emails.message', ['messageText' => Input::get('description'), ], function ($message) use ($resumeId) {
                    $to = User::find(Resume::find($resumeId)->id_u)->email;
                    $message->to($to, User::find(Resume::find($resumeId)->id_u)->name)->subject(Input::get('name_u'));
                });
                return view('Resume/send_message');
            }
            else
            return view('Resume/send_message');
            //$user = User::find($auth->user()->getAuthIdentifier());


        }
        else{
            return Redirect::to('auth/login');
        }
    }

    public function sortResumes(City $cityModel)
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

        if($industry > 0 && $city < 1)
            $resumes = Resume::where('industry' , $industry)->latest('updated_at')->paginate(25);
        elseif($city > 0 && $industry < 1)
            $resumes = Resume::whereIn('city',[$city, 1])->latest('updated_at')->paginate(25);
        else
            $resumes = Resume::latest('updated_at')->paginate(25);

        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id' => $city,
            'industry_id' => $industry,
            'cities' => $cities));
    }
}
