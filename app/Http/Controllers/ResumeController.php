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
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpKernel\Tests\DataCollector\DumpDataCollectorTest;
use View;
use Illuminate\Support\Facades\Mail;
use App\Models\Currency;
use File;

class ResumeController extends Controller {// Клас по роботі з резюме

    private $publishedOptions = ['Недоступно','Доступно всім','Доступно зареєстрованим'];
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
            abort(404);
        }

        $resume = Resume::find($id);
        if(!isset($resume))
        {
            abort(404);
        }
        return $resume;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $http;
    public function index(Guard $auth)//Output all resumes
    {
        if (Auth::check()) {
                    $resumes = User::find($auth->user()->getAuthIdentifier())->GetResumes()->paginate(25);
            if (count($resumes)==0) {
                $mes = "Зараз у Вас немає резюме.";
                return  view('Resume.myResumes', ['resumes'=> $resumes, 'mes'=>$mes]);
            } else {

                $resumes->sortBy('created_at');
                $mes = null;
                return  view('Resume.myResumes', ['resumes'=> $resumes, 'mes'=>$mes]);
            }
        } else {
            return Redirect::to('auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(City $cityModel, Guard $auth, Industry $industryModel)// Create new resume
    {
	if (isset($_SERVER['HTTP_REFERER']))
	        $this->http=$_SERVER['HTTP_REFERER'];

        if(Auth::check()){
            $cities = $cityModel->getCities();
            $industries = $industryModel->getIndustries();
            $userEmail = User::find($auth->user()->getAuthIdentifier())->email;
            $position = Input::get('position_',0);
            $positions = Resume::groupBy('position')->lists('position');
            $currency = new Currency();
            $currencies = $currency->getCurrencies();

            return view('Resume.create', ['cities'=> $cities, 'industries'=> $industries, 'userEmail' => $userEmail, 'positions'=>$positions, 'currencies' => $currencies, 'publishedOptions'=> $this->publishedOptions]);
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
        //Input::flush();
        Validator::extend('minSalary', function ($attribute, $value, $parameters) use ($request){
            if ($value < $request['salary_max'])
                return true;
            else return false;
        });

        $rules = 'required|min:3';
        $this->validate($request,[
            'name_u' => 'required|min:3|regex:/[a-zA-Zа-яА-Я]/',
            'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric|min_salary',
            'salary_max' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric',
            'description' => $rules,
            'city' => 'required',
            'loadResume' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        if(Input::hasFile('loadResume'))
        {
            $fname = $auth->user()->getAuthIdentifier();

            $file = Input::file('loadResume');

            $extensions = ['.jpg', '.jpeg', '.png'];

            foreach($extensions as $i)
                if(File::exists(base_path() . '/public/image/resume/' . $fname . $i))
                    File::delete(base_path() . '/public/image/resume/' . $fname . $i);

            $filename = $fname . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/image/resume', $filename);
        }

        $resume = $resumeModel->fillResume(0,$auth,$request);

        $resume->save();


        return redirect()->route('cabinet.index');
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
        Cookie::queue('url', 'resume/'.$id);
        $view = 'Resume.show';
        $search_boolean = 'false';
        $search_request = "";
        $resume = $this->getResume($id);

        $userResume = $resume->ReadUser($id);

        $city = City::find($resume->city);

        $user = auth()->user();

        /*--------for search.show------------*/
        $indusrties = Industry::all();
        $specialisations = Vacancy::groupBy('position')->lists('position');
        $cities = City::all();
        /*-----------------------------------------*/

        if(Auth::check())
        {
            if($user->id == $userResume->id)
            {
                $view = "Resume.showMyResume";
            }
        }
        if(!Auth::check() && ($resume->published == 0 || $resume->published == 2)) {
            abort(404);
        }
        else{
            if (Auth::check())
                if(Auth::user()->id != $userResume->id && $resume->published == 0 && Auth::user()->role !=1 )
                    abort(404);
        }


        return view($view)
            ->with('resume',$resume)
            ->with('city',$city)
            ->with('data',$search_request)
            ->with('industries', $indusrties)
            ->with('specialisations', $specialisations)
            ->with('cities',$cities)
            ->with('search_boolean',$search_boolean);


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
            Session::put('salary_min', $resume->salary);
            Session::put('salary_max', $resume->salary_max);
            $cities = $city->getCities();
            $industries = $industry->getIndustries();

            $currency = new Currency();
            $currencies = $currency->getCurrencies();
            $positions = Resume::groupBy('position')->lists('position');
            if (User::find(Resume::find($resume->id)->id_u)->id==Auth::id())
            return view('Resume.edit')
                ->with('resume',$resume)
                ->with('cities',$cities)
                ->with('industries',$industries)
                ->with('positions', $positions)
                ->with('currencies', $currencies)
                ->with('publishedOptions',$this->publishedOptions);
            else abort(403);
        }
        else
            return Redirect::to('auth/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request,Resume $resume,Guard $auth)
    {

        Validator::extend('minSalary', function ($attribute, $value, $parameters) use ($request){
            if ($value < $request['salary_max'])
                return true;
            else return false;
        });


        $rules = 'required|min:3';
        $this->validate($request,[
            'name_u' => 'required|min:3|regex:/[a-zA-Zа-яА-Я]/',
            'telephone' => 'regex:/^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$/',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric|min_salary',
            'salary_max' => 'required|regex:/[^0]+/|min:1|max:1000000000|numeric',
            'description' => $rules,
            'city' => 'required',
            'loadResume' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $updateResume = $resume->fillResume($id,$auth,$request);
        $updateResume->push();
        $updateResume->save();

        return redirect()->route('cabinet.index');

    }

    public function block(Request $request, Guard $auth)
    {
        if (Auth::user()->role == 1 && $request->isMethod('post')) {
            $updateResume = Resume::find($request['id']);
            $updateResume->published =0;
            $updateResume->save();
                Mail::send('emails.notificationEdit', ['messageText' => 'Ваше резюме було заблоковано адміністратором'], function ($message) use ($updateResume) {
                    $to = User::find($updateResume->id_u)->email;
                    $message->to($to, User::find($updateResume->id_u)->name)->subject('Ваше резюме було відредаговане адміністратором');
                });
        }
        else
        return redirect()->back();

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
        if (User::find(Resume::find($id)->id_u)->id==Auth::id()) {
            Resume::destroy($id);
            return redirect()->route('cabinet.index');
        }
        else
            abort(403);
        //$resume->destroy();
    }

    public function deletePhoto(Request $request)
    {
        if ($request->isMethod('POST'))
            File::delete(base_path() . '/public/image/resume/' .$request->input('name'));


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
                return view('Resume/resumeAnswer');
            }
            else
                return view('Resume/send_message');
            //$user = User::find($auth->user()->getAuthIdentifier());


        }
        else{
            return Redirect::to('auth/login');
        }
    }
}
