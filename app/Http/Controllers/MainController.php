<?php namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FilterVacanciesModels;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Models\Industry;
use Illuminate\Auth\Guard;
use Illuminate\Database\Eloquent\Collection;
use Input;
use Request;
use Session;
use DB;
use View;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

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
                $vacancies = Vacancy::where('city', '=', $city)->latest('id')->paginate(2);
            } elseif ($city > 0 && $industry > 0) {
                $vacancies = Vacancy::where('city', '=', $city)->where('branch', '=', $industry)->latest('id')->paginate(2);
            } elseif ($industry > 0 && $city < 1) {
                $vacancies = Vacancy::where('branch', $industry)->paginate(2);
            } else {
                $vacancies = Vacancy::latest('id')->paginate(25);
            }


            return Response::json(['succes' => true, 'vacancies' => $vacancies->toJson()]);
        }
    }


    public function showVacancies(City $cityModel,Vacancy $vacancy)
    {
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);

        $cities = $cityModel->getCities();
        $city = Input::get('city_id', 0);

        $vacancies = Vacancy::AllVacancies()->paginate(25);

        if (Request::ajax()) {

            $vacancies = MainController::ShowFilterVacancies($city, $industry);
            if($vacancies != null)
            {
                $vacancies->sortByDesc('updated_at');
            }
            return Response::json(View::make('main.filter.vacancy',
                array('vacancies' => $vacancies,
                    'industries' => $industries,
                    'cities' => $cities,
                    'city_id'=>$city,
                    'industry_id' => $industry)
            )->render());
        }
        return View::make('main.filter.filterVacancies', array(
            'vacancies' => $vacancies,
            'industries' => $industries,
            'city_id'=>$city,
            'industry_id' => $industry,
            'cities' => $cities));
    }

    public function showResumes(City $cityModel)
    {
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);

        $cities = $cityModel->getCities();
        $city = Input::get('city_id',0);

        $resumes = Resume::latest('updated_at')->paginate(25);

        if (Request::ajax()) {
            //dd(Resume::where('city',$city)->latest('id'));

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////
            if($city > 1 && $industry == 0){

                $resumes = Resume::whereIn('city',[$city, 1])->latest('updated_at')->paginate(25);
                //dd(City::find(1));
            }
            elseif($city > 1 && $industry > 0){
                $resumes = Resume::whereIn('city' ,[$city, 1])->where('industry', '=', $industry)->latest('updated_at')->paginate(25);
            }
            elseif( $city == 1 && $industry > 0){
                $resumes = Resume::where('industry' , $industry)->latest('updated_at')->paginate(25);
            }
            else
            {
                $resumes = Resume::latest('updated_at')->paginate(25);
            }

            if ($resumes->count() == 0)
            {
                return "<br /> По вказаним Вами умовах резюме відсутні";
            }

            return Response::json(View::make('main.filter.resume',
                array('resumes' => $resumes,
                    'industries' => $industries,
                    'cities' => $cities,
                    'city_id'=>$city,
                    'industry_id' => $industry)
            )->render());
        }
        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id'=>$city,
            'industry_id' => $industry,
            'cities' => $cities));
    }

    public function ShowFilterVacancies($city_id,$industry_id)
    {

        if($city_id > 1 && $industry_id == 0)
        {
            $vacancy_list = City::find($city_id)->Vacancies()->paginate(25);
            //dd($vacancy_list);
            return $vacancy_list;
        }
        elseif($city_id == 1 && $industry_id > 0)
        {
            $filterVacancies = Industry::find($industry_id)->GetVacancies()->paginate(25);
            //dd($filterVacancies);
            return $filterVacancies;
        }
        elseif($city_id > 1 && $industry_id > 0)
        {
            $vacancies = City::find($city_id)->Vacancies()->where('branch', '=', $industry_id)->paginate(25);
            return $vacancies;
        }

        elseif($city_id == 1 && $industry_id == 0)
        {
            return Vacancy::AllVacancies()->paginate(25);
        }

    }
}
