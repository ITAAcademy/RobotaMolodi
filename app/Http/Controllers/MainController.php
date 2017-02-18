<?php namespace App\Http\Controllers;
use App\Models\City;
use App\Models\FilterVacanciesModels;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Models\Industry;
use Illuminate\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Input;
use Request;
use Session;
use DB;
use View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Models\Company;
class MainController extends Controller
{

    const paginateCount = 25;
    const paginateFilter = 'upduted_at';
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index(City $cityModel, Guard $auth)
    {
        //dd($auth->user());
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();
        $vacancies = Vacancy::latest('id')->paginate(25);
        Session::forget('city');
        Session::forget('industry');
        //Session::flush();
        return view('main.index', ['vacancies' => $vacancies, 'cities' => $cities, 'industries' => $industries]);
    }
    public function filters(City $cityModel)
    {
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();
        if (Input::get('industry') || Input::get('city')) {
            $city_i = Input::get('city');
            $industry_i = Input::get('industry');
            session(['city' => $city_i, 'industry' => $industry_i]);
        }
        $city = session('city');
        $industry = session('industry');
        if ($city > 0 && $industry < 1) {
            $vacancies = Vacancy::where('city', '=', $city)->latest('id')->paginate(25);
        } elseif ($city > 0 && $industry > 0) {
            $vacancies = Vacancy::where('city', '=', $city)->where('branch', '=', $industry)->latest('id')->paginate(25);
        } elseif ($industry > 0 && $city < 1) {
            $vacancies = Vacancy::where('branch', '=', $industry)->latest('id')->paginate(25);
        } else {
            $vacancies = Vacancy::latest('id')->paginate(25);
        }
        return view('main.filter',
            ['vacancies' => $vacancies,
                'cities' => $cities,
                'industries' => $industries,
                'city_f' => $city,
                'industry_f' => $industry]);
    }
    public function filterVacancy(City $cityModel)
    {
        if (Request::ajax()) {
            $city = Input::get('city_id');
            $industry = Input::get('industry_id');
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////
            //$vacancies = Vacancy::where('branch','=',$industry);
            if ($city > 0 && $industry < 1) {
                $vacancies = Vacancy::where('city', '=', $city)->latest('id')->paginate(25);
            } elseif ($city > 0 && $industry > 0) {
                $vacancies = Vacancy::where('city', '=', $city)->where('branch', '=', $industry)->latest('id')->paginate(25);
            } elseif ($industry > 0 && $city < 1) {
                $vacancies = Vacancy::where('branch', $industry)->paginate(25);
            } else {
                $vacancies = Vacancy::latest('id')->paginate(25);
            }
            return Response::json(['succes' => true, 'vacancies' => $vacancies->toJson()]);
        }
    }
    public function showVacancies(City $cityModel,Vacancy $vacancy)
    {
        $pag = 2;
        Cookie::queue('url', '/');
        //----------filter from loner vacancy--------------------
        $search_request = Input::get('filterValue');
        if(!$search_boolean = Input::get('filterName'))
            $search_boolean = false;
        //----------filter ends here-----------------------------
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);
        $cities = $cityModel->getCities();
        $citiesSelect = Input::get('city_id');
        $specialisation = Input::get('specialisation_',0);
        $specialisations = Vacancy::groupBy('position')->lists('position');

        if (Auth::check()){
            $vacancies = Vacancy::AllVacancies()->where('published', '>', 0)->paginate($pag);

        }else{
            $vacancies = Vacancy::AllVacancies()->where('published', '=', 1)->paginate($pag);

        }
        if (Request::ajax())
        {
            $search_request_=Request::get('data');
            $vacancies = MainController::ShowFilterVacancies($citiesSelect, $industry,$specialisation);

            if ($vacancies->count() == 0)
            {
                return "<br /> По вказаним Вами умовах вакансії відсутні";
            }
            if($vacancies != null)
            {
                $vacancies->sortByDesc('updated_at');
            }
            return Response::json(View::make('vacancy._vacancy',
                array('vacancies' => $vacancies,
                    'industries' => $industries,
                    'cities' => $cities,
                    'city_id'=>$citiesSelect,
                    'industry_id' => $industry,
                    'specialisation'=>$specialisations,
                    'data'=>$search_request_)
            )->render());
        }
        return View::make('main.filter.filterVacancies', array(
            'vacancies' => $vacancies,
            'industries' => $industries,
            'city_id'=>$citiesSelect,
            'industry_id' => $industry,
            'cities' => $cities,
            'specialisation'=> $specialisations,
            'search_boolean'=> $search_boolean,
            'data'=>$search_request));
    }
    public function showCompanies(){
        $url=url('scompany/company_vac/');
        $companies = Company::latest('id')->paginate(25);
        return view('main.filter.filterCompanies', ['companies' => $companies,  'url' => $url]);
    }
    public function showResumes(City $cityModel)
    {
        Cookie::queue('url', 'sresume');
        //----------filter from loner resume--------------------
        if(!$search_boolean = Input::get('filterName'))
            $search_boolean = false;
        $search_request = Input::get('filterValue');
        //----------filter ends here-----------------------------
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);
        $cities = $cityModel->getCities();
        $inputCities = Input::get('city_id');
        $specialisation = Input::get('specialisation_',0);
        $specialisations = Resume::groupBy('position')->lists('position');
        if (Auth::check())
            $resumes = Resume::latest('updated_at')->where('published','>',0)->paginate(25);
        else
            $resumes = Resume::latest('updated_at')->where('published','=',1)->paginate(25);
        if (Request::ajax()) {
            //dd(Resume::where('city',$city)->latest('id'));
            $search_boolean = 'false';
            $search_request_=Request::get('data');
//            dd($inputCities);
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($inputCities !=null && $industry =='empty' && $specialisation=='empty'){
                if (Auth::check())
                    $resumes = Resume::whereIn('city',$inputCities)
                        ->latest('updated_at')
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::whereIn('city',$inputCities)
                        ->latest('updated_at')
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif($inputCities !=null && $industry !='empty' && $specialisation=='empty'){
                if (Auth::check())
                    $resumes = Resume::whereIn('city' ,$inputCities)
                        ->where('industry', '=', $industry)
                        ->latest('updated_at')
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::whereIn('city' ,$inputCities)
                        ->where('industry', '=', $industry)
                        ->latest('updated_at')
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif( $inputCities ==null && $industry !='empty' && $specialisation=='empty') {
                if (Auth::check())
                    $resumes = Resume::where('industry' , $industry)
                        ->latest('updated_at')
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::where('industry' , $industry)
                        ->latest('updated_at')
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif($inputCities ==null && $industry =='empty' && $specialisation=='empty')
            {
                if (Auth::check())
                    $resumes = Resume::latest('updated_at')
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::latest('updated_at')
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif($inputCities !=null && $industry =='empty' && $specialisation!='empty')
            {
                if (Auth::check())
                    $resumes = Resume::whereIn('city',$inputCities)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::whereIn('city',$inputCities)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif($inputCities !=null && $industry !='empty' && $specialisation!='empty')
            {
                if (Auth::check())
                    $resumes = Resume::whereIn('city' ,$inputCities)
                        ->where('industry', '=', $industry)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::whereIn('city' ,$inputCities)
                        ->where('industry', '=', $industry)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif( $inputCities ==null && $industry !='empty' && $specialisation!='empty')
            {
                if (Auth::check())
                    $resumes = Resume::where('industry' , $industry)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::where('industry' , $industry)
                        ->latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','=',1)
                        ->paginate(25);
            }
            elseif($inputCities ==null && $industry =='empty' && $specialisation!='empty')
            {
                if (Auth::check())
                    $resumes = Resume::latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','>',0)
                        ->paginate(25);
                else
                    $resumes = Resume::latest('updated_at')
                        ->where('position','=',$specialisation)
                        ->where('published','>',0)
                        ->paginate(25);
            }
            if ($resumes->count() == 0)
            {
                return "<br /> По вказаним Вами умовах резюме відсутні";
            }
            if($resumes != null)
            {
                $resumes->sortByDesc('updated_at');
            }
            return Response::json(View::make('Resume._resume',
                array('resumes' => $resumes,
                    'industries' => $industries,
                    'cities' => $cities,
                    'city_id'=>$inputCities,
                    'industry_id' => $industry,
                    'specialisation'=>$specialisations,
                    'specialisation'=>$specialisations,
                    'data'=>$search_request_)
            )->render());
        }
        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id'=>$inputCities,
            'industry_id' => $industry,
            'cities' => $cities,
            'specialisation'=>$specialisations,
            'search_boolean'=> $search_boolean,
            'data'=>$search_request));
    }
    public function ShowFilterVacancies($cities_id,$industry_id,$specialisation)
    {
        if($cities_id !=null && $industry_id =='empty' && $specialisation=='empty')
        {
            $list = Array();
            for ($i = 0; $i < count($cities_id); $i++) {
                $value = array_get($cities_id, $i);
                $res = City::find($value)->Vacancies()->getRelatedIds()->toArray();
                $list= array_merge($list, $res);
                $list = array_unique($list);
            }
            if(Auth::check()){
                $vacancy_list = Vacancy::whereIn('id',$list)
                    ->latest('updated_at')
                    ->where('published', '>', 0)
                    ->paginate(25);
            }
            else{
                $vacancy_list = Vacancy::whereIn('id',$list)
                    ->latest('updated_at')
                    ->where('published', '=', 1)
                    ->paginate(25);
            }
            return $vacancy_list;
        }
        elseif($cities_id ==null && $industry_id !='empty' && $specialisation=='empty')
        {   if(Auth::check())
            $filterVacancies = Industry::find($industry_id)
                ->GetVacancies()->where('published','>',0)->get()
                ->paginate(25);
        else
            $filterVacancies = Industry::find($industry_id)
                ->GetVacancies()->where('published','=',1)
                ->paginate(25);
            return $filterVacancies;
        }
        elseif($cities_id !=null && $industry_id !='empty'&& $specialisation=='empty')
        {
//            dd($city_id);
            $list = Array();
            for ($i = 0; $i < count($cities_id); $i++) {
                $value = array_get($cities_id, $i);
                $res = City::find($value)->Vacancies()->getRelatedIds()->toArray();
                $list= array_merge($list, $res);
                $list = array_unique($list);
            }
            if(Auth::check()){
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')->where('published', '>', 0)
                    ->where('branch', '=', $industry_id)
                    ->paginate(25);
            }
            else{
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')->where('published', '=', 1)
                    ->where('branch', '=', $industry_id)
                    ->paginate(25);
            }
            return $vacancy_list;
        }
        elseif($cities_id ==null && $industry_id =='empty' && $specialisation=='empty')
        {
            if(Auth::check())
                return Vacancy::AllVacancies()->where('published','>',0)
                    ->paginate(25);
            else
                return Vacancy::AllVacancies()->where('published','=',1)
                    ->paginate(25);
        }
        elseif($cities_id !=null && $industry_id =='empty' && $specialisation!='empty')
        {
            $list = Array();
            for ($i = 0; $i < count($cities_id); $i++) {
                $value = array_get($cities_id, $i);
                $res = City::find($value)->Vacancies()->getRelatedIds()->toArray();
                $list= array_merge($list, $res);
                $list = array_unique($list);
            }
            if(Auth::check()){
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')
                    ->where('position','=',$specialisation)
                    ->where('published', '>', 0)
                    ->paginate(25);
            }
            else{
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')
                    ->where('position','=',$specialisation)
                    ->where('published', '=', 1)
                    ->paginate(25);
            }
            return $vacancy_list;
        }
        elseif($cities_id ==null && $industry_id !='empty' && $specialisation!='empty')
        {
            if(Auth::check())
                $filterVacancies = Industry::find($industry_id)
                    ->GetVacancies()
                    ->where('position','=',$specialisation)
                    ->where('published','>',0)
                    ->paginate(25);
            else
                $filterVacancies = Industry::find($industry_id)
                    ->GetVacancies()
                    ->where('position','=',$specialisation)
                    ->where('published','=',1)
                    ->paginate(25);
            return $filterVacancies;
        }
        elseif($cities_id !=null && $industry_id !='empty' && $specialisation!='empty')
        {
            $list = Array();
            for ($i = 0; $i < count($cities_id); $i++) {
                $value = array_get($cities_id, $i);
                $res = City::find($value)->Vacancies()->getRelatedIds()->toArray();
                $list= array_merge($list, $res);
                $list = array_unique($list);
            }
            if(Auth::check()){
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')
                    ->where('branch', '=', $industry_id)
                    ->where('position','=',$specialisation)
                    ->where('published', '>', 0)
                    ->paginate(25);
            }
            else{
                $vacancy_list = Vacancy::whereIn('id',$list)->latest('updated_at')
                    ->where('branch', '=', $industry_id)
                    ->where('position','=',$specialisation)
                    ->where('published', '=', 1)
                    ->paginate(25);
            }
            return $vacancy_list;
        }
        elseif($cities_id ==null && $industry_id =='empty' && $specialisation!='empty')
        {
            if(Auth::check())
                return Vacancy::AllVacancies()
                    ->where('position','=',$specialisation)
                    ->where('published','>',0)
                    ->paginate(25);
            else
                return Vacancy::AllVacancies()
                    ->where('position','=',$specialisation)
                    ->where('published','=',1)
                    ->paginate(25);
        }
    }
}