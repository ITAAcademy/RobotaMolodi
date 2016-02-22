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
//use Illuminate\Support\Facades\Session;
class SearchController extends Controller
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
    public function index()
    {

    }

    public function filters()
    {

    }

    public function filterVacancy()
    {

    }

/////////////method Search_and_Show Vacancy by Position and Description/////////////////////////
    public function showVacancies()
    {
        $cityModel = new City() ;
        $data = Request::input('search_field');
		    $vacancies  = Vacancy::AllVacancies()->where('position','Like',"%$data%")->orWhere('description','Like',"%$data%")->paginate(25);
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);
        $cities = $cityModel->getCities();
        $city = Input::get('city_id', 0);
		    $specialisations = Vacancy::groupBy('position')->lists('position');


        return View::make('main.filter.filterVacancies', ['vacancies' => $vacancies,
            'cities' => $cities,
            'industries' => $industries,
            'city_f' => $city,
            'industry_f' => $industry,
			      'specialisation'=>$specialisations]);
    }
/////////////method Search_and_Show Resumes by Position and Description/////////////////////////
    public function showResumes()
    {
        //$specialisation = Input::get('specc',0);
        $specialisations = Resume::groupBy('position')->lists('position');
        $industries = Industry::orderBy('name')->get();
        $industry = Input::get('industry_id',0);
        $cityModel= new City();

        $cities = $cityModel->getCities();
        $city = Input::get('city_id',0);
        $data = Request::input('search_field');
        $resumes = Resume::latest('updated_at')->where('position','Like',"%$data%")->orWhere('description','Like',"%$data%")->paginate(25);

        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id'=>$city,
            'industry_id' => $industry,
            'cities' => $cities,
			      'specialisation'=>$specialisations));
    }

    public function ShowFilterVacancies()
    {


           // return Vacancy::AllVacancies()->paginate(25);


    }
}
