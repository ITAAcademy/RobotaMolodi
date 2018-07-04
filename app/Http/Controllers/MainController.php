<?php namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Rating;
use App\Models\Resume;
use App\Models\News;
use App\Models\Vacancy;
use App\Models\Industry;
use Illuminate\Auth\Guard;
use App\Filter;
use App\Http\Requests;
use Input;
use Session;
use DB;
use View;
use Illuminate\Support\Facades\Response;
use App\Models\Company;
use App\Http\Controllers\FilterController;
use Illuminate\Http\Request;

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
        $vacancies = Vacancy::latest('id')->unblockVacancies()->paginate(25);
        Session::forget('city');
        Session::forget('industry');
        return view('main.index', array(
            'vacancies' => $vacancies,
            'cities' => $cities,
            'industries' => $industries
        ));
    }

    public function showVacancies(Request $request)
    {
        if ($request->ajax()) {
            $vacancies = Filter::vacancies($request)->isActive()->unblockVacancies()->paginate();
            return view('newDesign.vacancies.vacanciesList', array(
                'vacancies' => $vacancies,
            ));
        }
        $vacancies = Vacancy::allVacancies()->isActive()->unblockVacancies()->paginate();
        $specialisations = Vacancy::groupBy('position')->lists('position');
        Filter::routeFilterPaginator($request, $vacancies);
        $topVacancy = Vacancy::getTopVacancies();
        return View::make('main.filter.filterVacancies', array(
            'vacancies' => $vacancies,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news' => News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }

    public function showCompanies(Request $request)
    {

        $companies = Filter::companies($request)->allCompanies()->where('blocked', false)->paginate();
        Filter::routeFilterPaginator($request, $companies);
        $specialisations = Vacancy::groupBy('position')->lists('position');
        if ($request->ajax()) {
            return view('newDesign.company.companiesList', array(
                'companies' => $companies,
            ));
        }

        $topVacancy = Vacancy::getTopVacancies();

        return view('main.filter.filterCompanies', array(
            'companies' => $companies,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news' => News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }

    public function showResumes(Request $request)
    {
        $resumes = Filter::resumes($request)->allResumes()->where('blocked', false)->paginate();
        Filter::routeFilterPaginator($request, $resumes);

        $specialisations = Resume::groupBy('position')->lists('position');
        if ($request->ajax()) {
            return view('newDesign.resume.resumesList', ['resumes' => $resumes]);
        }
        $topVacancy = Vacancy::getTopVacancies();

        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news' => News::getNews(),
            'topVacancy' => $topVacancy,
        ));
    }
}
