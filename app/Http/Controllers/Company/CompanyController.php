<?php namespace App\Http\Controllers\Company;


use App\Models\User;
use App\Models\Industry;
use App\Models\City;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Models\Comment;
use App\Models\Rating;
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
            $user = User::find($auth->user()->getAuthIdentifier());
            $companies = $user->getCompanies()->paginate(25);

            $url = url('company/');
            $mes = null;

            if(count($companies) == 0) {
                $mes = "Зараз у Вас немає компаній.";
            }

            return view('Company.myCompanies', ['companies' => $companies, 'mes'=>$mes, 'url' => $url,]);

        } else {
            return Redirect::to('auth/login');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if(Auth::check())
        {
            $company = new Company;
            $cities = City::all();
            $industries = Industry::all();
            return view('Company.create',['company' => $company, 'cities' => $cities, 'industries' => $industries]);
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
        $company = new Company;
        $input = $request->all();

        if ($company->validateForm($input)) {
            $company->users_id = Auth::User()->id;

            if(Input::hasFile('loadCompany')) {
                $cropcoord = explode(',', $request->fcoords);
                $file = Input::file('loadCompany');
                $filename = $file->getClientOriginalName();                 //take file name
                $directory = 'image/company/'. Auth::user()->id . '/';      //create url to directory
                Storage::makeDirectory($directory);                         //create directory
                Crop::input($cropcoord, $filename, $file, $directory);      //cuts and stores the image in the appropriate directory
                $company->image = $filename;
            }

            $company->fill($input)->save();
            Session::flash('flash_message', 'news successfully created!');
            return redirect()->route('company.index');
        }
        else {
            return redirect()->route('company.create')->withInput()->withErrors($company->getErrorsMessages());
        }
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
		public function show($id, Guard $auth)
	{
        $company = Company::find($id);
        $industry = Industry::find($company->industry_id);
        $city = City::find($company->city_id);
        $vacancies = Vacancy::where('company_id', $company->id)->get();
        $comments = Comment::where('company_id', $company->id)->get();
        

        return view('newDesign.company.show')
            ->with('company', $company)
            ->with('industry', $industry)
            ->with('city', $city)
            ->with('vacancies', $vacancies)
            ->with('comments', $comments);
    }

	public function edit($id){
        if (Auth::check()) {
            $company = Company::find($id);
            $cities = City::all();
            $industries = Industry::all();

            if (User::find(Company::find($company->id)->users_id)->id == Auth::id()){
                return view('Company.edit')
                    ->with('company', $company)
                    ->with('cities', $cities)
                    ->with('industries', $industries);
            } else abort(403);
        }
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
            $resume = Resume::where('user_id','=',$user->id)->get();
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
	public function update($id, Request $request)
	{
        $company = Company::find($id);
        $input = $request->all();

        if ($company->validateForm($input)) {

            $company->users_id = Auth::User()->id;
            $company->fill($input)->save();
            $company->push();

            return Redirect::to('company');
        } else {
            return redirect()->route('company.edit', ['company' => $company])->withInput()->withErrors($company->getErrorsMessages());
        }

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if (!is_numeric($id)) {
            abort(500);
        }
        $comapny = Company::find($id);
        if(empty($comapny)) {
            abort(404);
        }

        if ($comapny->users_id == Auth::id()) {
            Comment::where('company_id', $id)->delete();
            $comapny->projects->each(function ($project, $key){
                $project->members->each(function($member, $key){
                    $member->delete();
                });
                $project->delete();
            });
            Company::destroy($id);
            return redirect('company');
        }
        else
            abort(403);
	}

    public function rateCompany($id, Request $request)
    {
        $company = Company::find($id);
        if(Rating::isValid($request->all())){
            $mark = $request->mark;
            Rating::addRate($mark, $company);
            $countLike = Rating::getLikes($company);
            $countDisLike = Rating::getDislikes($company);
            return ['countLike' => $countLike, 'countDisLike' => $countDisLike];
        } else {
            return ['error' => Rating::getErrorsMessages()->first('mark')];
        }
    }

}
