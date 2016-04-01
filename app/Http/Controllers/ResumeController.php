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
use File;

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
            if (!$resumes) {
                $resumes = "Зараз у Вас немає резюме.";
                return  view('Resume.myResumes', ['resumes'=> $resumes]);
            } else {
                $resumes->sortByDesc('created_at');
                return  view('Resume.myResumes', ['resumes'=> $resumes]);
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
            'salary_max' => 'required|regex:/[^0]+/|min:1|numeric',
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
        $search_boolean = 'false';
        $search_request = "";
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
            ->with('city',$city)
            ->with('data',$search_request)
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
