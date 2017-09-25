<?php namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Rating;
use App\Models\Resume;
use App\Models\News;
use App\Models\Vacancy;
use App\Models\Industry;
use Illuminate\Auth\Guard;
use App\Http\Requests;
use Input;
use Request;
use Session;
use DB;
use View;
use Illuminate\Support\Facades\Response;
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
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();
        $vacancies = Vacancy::latest('id')->paginate(25);
        Session::forget('city');
        Session::forget('industry');
        return view('main.index', array(
            'vacancies' => $vacancies,
            'cities' => $cities,
            'industries' => $industries
        ));
    }

    public function showVacancies()
    {
        $vacancies = Vacancy::AllVacancies()->orderByDate()->paginate();
        $specialisations = Vacancy::groupBy('position')->lists('position');
        if(Request::ajax()){
            return view('newDesign.vacancies.vacanciesList', array(
                'vacancies' => $vacancies,
            ));
        }
        //Show top vacancies:
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return View::make('main.filter.filterVacancies', array(
            'vacancies' => $vacancies,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news'=>News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }

    public function showCompanies(){

        $companies = Company::latest('id')->orderByDate()->paginate();
        $specialisations = Vacancy::groupBy('position')->lists('position');
        if(Request::ajax()){
            return view('newDesign.company.companiesList', array(
                'companies' => $companies,
            ));
        }

        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return view('main.filter.filterCompanies', array(
            'companies' => $companies,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news'=>News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }

    public function showResumes()
    {
        $resumes = Resume::latest('updated_at')->paginate();
        $specialisations = Resume::groupBy('position')->lists('position');
        if(Request::ajax()){
            return view('newDesign.resume.resumesList', ['resumes' => $resumes]);
        }
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news'=>News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }

}