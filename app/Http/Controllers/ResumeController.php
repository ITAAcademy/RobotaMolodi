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
use App\Models\Currency;

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

            $currency = new Currency();
            $currencies = $currency->getCurrencies();

            return view('Resume.create', ['cities'=> $cities, 'industries'=> $industries, 'userEmail' => $userEmail, 'currencies' => $currencies]);
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

            $currency = new Currency();
            $currencies = $currency->getCurrencies();


            return view('Resume.edit')
                ->with('resume',$resume)
                ->with('cities',$cities)
                ->with('industries',$industries)
                ->with('currencies', $currencies);
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
        if(!$i = Input::get('industry_id'))
            $i = 0;
        $industry = Input::get('industry_id', (int)$i);

        $cities = $cityModel->getCities();
        if(!$c = Input::get('city_id'))
            $c = 0;
        $city = Input::get('city_id', (int)$c);

        $specialisations = Resume::groupBy('position')->lists('position');
        if(!$s = Input::get('specialisation_'))
            $s = 0;
        $specialisation = Input::get('specialisation_', $s);

        if (!$cities->has($city) || !$industries->has($industry))
            abort(500);

        if($industry > 0 && $city < 1)
            $resumes = Resume::where('industry' , $industry)->latest('updated_at')->paginate(25);
        elseif($city > 0 && $industry < 1)
            $resumes = Resume::whereIn('city',[$city, 1])->latest('updated_at')->paginate(25);
        else
            $resumes = Resume::latest('updated_at')->where('position', '=' ,$specialisation)->paginate(25);

        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id' => $city,
            'industry_id' => $industry,
            'cities' => $cities,
            'specialisation' => $specialisations));
    }
}