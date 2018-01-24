<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateNewResume;
use App\Http\Controllers\Controller;

use App\Models\Rating;
use Illuminate\Support\Facades\Storage;
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
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpKernel\Tests\DataCollector\DumpDataCollectorTest;
use View;
use Illuminate\Support\Facades\Mail;
use App\Models\Currency;
use App\Repositoriy\Crop;

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
    public function index(Guard $auth,Request $request)//Output all resumes
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
    public function create(City $cityModel, Guard $auth, Industry $industryModel, Resume $resume)// Create new resume
    {
        if(Auth::check()){
            if (isset($_SERVER['HTTP_REFERER']))
                $this->http=$_SERVER['HTTP_REFERER'];
            $resume = new Resume(['email' => $auth->user()->email ]);

            $cities = $cityModel->getCities();
            $industries = $industryModel->getIndustries();
            $userEmail = User::find($auth->user()->getAuthIdentifier())->email;
            $position = Input::get('position_',0);
            $positions = Resume::groupBy('position')->lists('position');
            $currencies = Currency::all();
            return view('Resume.create', [
                'cities'=> $cities,
                'industries'=> $industries,
                'resume' => $resume,
                'positions'=>$positions,
                'currencies' => $currencies,
                'publishedOptions'=> $this->publishedOptions
            ]);
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
    public function store(Resume $resumeModel, Request $request, Guard $auth)//Save resume in DB
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
        $resume = $resumeModel->fillResume(0,$auth,$request);

        if(Input::hasFile('loadResume'))
        {
            $cropcoord = explode(',', $request->fcoords);
            $file = Input::file('loadResume');
            $filename = $file->getClientOriginalName();                 //take file name
            $directory = 'image/resume/'. Auth::user()->id . '/';       //create url to directory
            Storage::makeDirectory($directory);                         //create directory
            Crop::input($cropcoord, $filename, $file, $directory);      //cuts and stores the image in the appropriate directory
            $resume->image = $filename;
        }

        $resume->save();

        return redirect()->route('cabinet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        Cookie::queue('url', 'resume/'.$id);
        $view = 'Resume.show';
        $resume = $this->getResume($id);
        $city = $resume->city;
        $user = auth()->user();

        if(Auth::check())
        {
            if($user->id == $resume->user->id)
            {
                $view = "Resume.showMyResume";
            }
        }
        if(!Auth::check() && $resume->published != 1) {
            $view ="Resume.noAccessResume";
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
            Session::put('salary_min', $resume->salary);
            Session::put('salary_max', $resume->salary_max);
            $cities = $city->getCities();
            $industries = $industry->getIndustries();

            $currency = new Currency();
            $currencies = $currency->getCurrencies();
            $positions = Resume::groupBy('position')->lists('position');
            if ($resume->user->id == Auth::id())
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
        if(Input::hasFile('loadResume'))
        {
            $cropcoord = explode(',', $request->fcoords);
            $file = Input::file('loadResume');
            $filename = $file->getClientOriginalName();                 //take file name
            $directory = 'image/resume/'. Auth::user()->id . '/';       //create url to directory
            Storage::makeDirectory($directory);                         //create directory
            Crop::input($cropcoord, $filename, $file, $directory);      //cuts and stores the image in the appropriate directory
            $updateResume->image = $filename;
        }
        $updateResume->push();
        $updateResume->save();

        return redirect()->route('cabinet.index');

    }

    public function block(Request $request, Guard $auth)
    {
        if (Auth::check() && Auth::user()->isAdmin() && $request->isMethod('post')) {
            $updateResume = Resume::find($request['id']);
            $updateResume->blocked = true;
            $updateResume->save();
            Mail::send(
                'emails.notificationEdit',
                ['messageText' => 'Ваше резюме було заблоковано адміністратором'],
                function ($message) use ($updateResume) {
                    $to = $updateResume->user->email;
                    $message->to(
                        $to,
                        $updateResume->user->name
                    )->subject('Ваше резюме було відредаговане адміністратором');
                }
            );
        }
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
        if (Resume::find($id)->user->id == Auth::id()) {
            Resume::destroy($id);
            return redirect()->route('cabinet.index');
        }
        else
            abort(403);
        //$resume->destroy();
    }

    public function change_image(Request $request){

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
                    $to = Resume::find($resumeId)->user->email;
                    $message->to($to, Resume::find($resumeId)->user->name)->subject(Input::get('name_u'));
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

    public function updatePablishDate($id){
        $resume = Resume::find($id);
        $resume->touch();
        return $resume->updated_at->format('j m Y');
    }

    public function rateResume($id, Request $request)
    {
        $resume = Resume::find($id);
        if(Rating::isValid($request->all())){
            $mark = $request->mark;
            Rating::addRate($mark, $resume);
            $countLike = Rating::getLikes($resume);
            $countDisLike = Rating::getDislikes($resume);
            return ['countLike' => $countLike, 'countDisLike' => $countDisLike];
        } else {
            return ['error' => Rating::getErrorsMessages()->first('mark')];
        }
    }

    public function showResumes(Request $request)
    {
        $nameFilter  = $request->get('name');
        $valueFilter = $request->get('value');
        // Have to validate ?
        if(isset($nameFilter, $valueFilter))
            $request->session()->flash($nameFilter, $valueFilter);
        return redirect()->route('main.resumes');
    }

}
