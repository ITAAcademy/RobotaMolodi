<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateNewResume;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
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

class ResumeController extends Controller {// Клас по роботі з резюме

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
        $cities = $cityModel->getCities();
        $industries = $industryModel->getIndustries();
        $userEmail = User::find($auth->user()->getAuthIdentifier())->email;

		return view('Resume.create', ['cities'=> $cities, 'industries'=> $industries, 'userEmail' => $userEmail,]);
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
            'telephone' => 'min:5',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:3|numeric',
            'description' => $rules,
            'city' => 'required'
        ]);


        $file = $_FILES['loadResume'];//$request->file('loadResume');

        $resume = $resumeModel->fillResume(0,$auth,$request);

        $resume->save();

        return redirect()->route('resumes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,Guard $auth)
	{
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        $view = 'Resume.show';

        $resume = Resume::find($id);

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
            $resume = Resume::find($id);
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
            'telephone' => 'min:5',
            'email' => 'required|email',
            'position' => $rules,
            'salary' => 'required|regex:/[^0]+/|min:3|numeric',
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
		Resume::destroy($id);

        return redirect()->route('cabinet.index');
        //$resume->destroy();
	}
    public function send_message(){
        return view('Resume/send_message');
    }

}
