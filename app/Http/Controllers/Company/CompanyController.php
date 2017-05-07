<?php namespace App\Http\Controllers\Company;


use App\Models\User;
use App\Models\Industry;
use App\Models\City;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\Models\News;
use File;
use View;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Repositoriy\Crop;


class CompanyController extends Controller  {

    private function getCompany($id)
    {
        if (!is_numeric($id))
        {
            abort(404);
        }

        $company = Company::find($id);

        if (!isset($company))
        {
            abort(404);
        }

        return $company;
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Guard $auth)
	{
        if(Auth::check())
        {
            $companies = User::find($auth->user()->getAuthIdentifier())->getCompanies()->paginate(25);
            $url=url('company/');

            if(count($companies)==0)
            {
                $mes = "Зараз у Вас немає компаній.";
                return view('Company.myCompanies', ['companies' => $companies, 'mes'=>$mes, 'url' => $url,]);
            }
            else
            {
                $mes=null;
//                return view('Company._company', ['companies' => $companies, 'mes'=>$mes, 'url' => $url,]);
                return view('Company.myCompanies', ['companies' => $companies, 'mes'=>$mes, 'url' => $url,]);
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
	public function create(Company $company)
	{
        if(Auth::check())
        {
            $company = ' ';
            
            if(Session::get('company') != '')
            {
                $company = Session::get('company');
            }
            return view('Company.regCompany',['company' => $company]);
    
        } else {
            return Redirect::to('auth/login');
        }
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request,[
            'company_name' => 'required|min:3',
            'company_link' => 'url'
        ]);

        $companies = new Company();
        $companies->users_id = Auth::User()->id;
        $companies->company_name = $request['company_name'];
        $companies->company_email = $request['company_link'];

        if(Input::hasFile('loadCompany')) {
            $cropcoord = explode(',', $request->fcoords);
            $file = Input::file('loadCompany');
            $filename = $file->getClientOriginalName();                 //take file name
            $directory = 'image/company/'. Auth::user()->id . '/';      //create url to directory
            Storage::makeDirectory($directory);                         //create directory
            Crop::input($cropcoord, $filename, $file, $directory);      //cuts and stores the image in the appropriate directory
            $companies->image = $filename;
        }
        $companies->save();

        session_start();

        if(isset ($_SESSION['path'])) {
            $path = $_SESSION['path'];
            session_unset();
        } else {
            $path = 'company.index';
        }

        return redirect()->route($path);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
		public function show($id, Guard $auth)
	{
        Cookie::queue('url', 'company/'.$id);
        $view = 'newDesign.company.show';
        $search_boolean = 'false';
        //$company = Company::find($id);
        $company = $this->getCompany($id);

        $userCompany = $company->ReadUser($id);

        $vacancies = Vacancy::where('company_id','=',$id);


        $industry = Vacancy::where('company_id','=',$id)->lists('branch')->first();
        $industryName = Industry::where('id','=',$industry)->lists('name')->first();


        return view($view)
            ->with('vacancy', $vacancies)
            ->with('user', $userCompany)
            ->with('industryName', $industryName)
            ->with('company', $company)
            ->with('industry', $industry)
            ->with('search_boolean',$search_boolean);
    }

	public function edit($id)
	{
//
        if (Auth::check()) {
            $company = $this->getCompany($id);
            if (User::find(Company::find($company->id)->users_id)->id == Auth::id())
                return view('Company.edit')->with('company', $company);
            else
                abort(403);
        }
        else
            return Redirect::to('auth/login');
	}

    public function showCompanyVacancies($id){
        $specialisations = Vacancy::groupBy('position')->lists('position');
        $vacancies = Vacancy::where('company_id', $id)->paginate();
        return view('newDesign.vacancies.vacanciesList', array(
            'vacancies' => $vacancies,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news'=>News::all(),
        ));
    }

    public function showFormSendFile($id, Guard $auth){
        if(auth()->user()){

            $company = $this->getCompany($id);
            return view('newDesign.company.formSendFile',['company' => $company]);
        }else{
            return "Ви не зареєстровані";
        }
    }
    public function showFormSendResume($id, Guard $auth){
        if(auth()->user()){
            $company = $this->getCompany($id);
            $view = 'newDesign.company.formSendResume';
            $vacancies = Vacancy::where('company_id','=',$id)->get();
            $user = auth()->user();
            $resume = Resume::where('id_u','=',$user->id)->get();
            return view($view)
                ->with('company', $company)
                ->with('vacancy', $vacancies)
                ->with('resume', $resume);
        }else{
            return "Ви не зареєстровані";
        }
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{

        $this->validate($request,[
            'company_name' => 'required|min:3',
            'company_link' => 'url'
        ]);

        $company_name = $request['company_name'];
        $company_email = $request['company_link'];

        $company = Company::find($id);

        $company->company_name = $company_name;
        $company->company_email = $company_email;

        $company->save();
        $company->push();

        return redirect('company');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if (!is_numeric($id))
        {
            abort(500);
        }
        if (User::find(Company::find($id)->users_id)->id == Auth::id()) {
            Company::destroy($id);

            return redirect('company');
        }
        else
            abort(403);
	}

}
