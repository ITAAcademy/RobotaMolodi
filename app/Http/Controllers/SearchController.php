<?php namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FilterVacanciesModels;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Models\Company;
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

    public function showCompanies_search()
    {
      $url=url('scompany/company_vac/');
      $search_request = Request::input('search_field');
          $companies = Company::latest('id')->where('company_name','Like',"%$search_request%")->paginate(25);
        //  dd($companies);
          return view('main.filter.filterCompanies', ['companies' => $companies,  'url' => $url]);

    }

/////////////method Search_and_Show Vacancy by Position and Description/////////////////////////
    public function showVacancies()
    {
        $specialisation = Input::get('specialisation_',0);
        $industry_id = Input::get('industry_id',0);
        $city_id = Input::get('city_id', 0);
        $search_request = Request::input('search_field');

        $industries = Industry::orderBy('name')->get();
        $specialisations = Vacancy::groupBy('position')->lists('position');

        $search_boolean = 'true';
        $cityModel = new City() ;
        $cities = $cityModel->getCities();


		    $vacancies  = Vacancy::AllVacancies()
        ->where('position','Like',"%$search_request%")
        ->orWhere('description','Like',"%$search_request%")
        ->latest('updated_at')
        ->paginate(25);


        if (Request::ajax()) {
        $search_request_=Request::get('data');
        $search_boolean = 'true';
        if($city_id !='empty' && $industry_id =='empty' && $specialisation=='empty')
        {

            $vacancies =City::find($city_id)
            ->Vacancies()
            ->where(function($query) use ($search_request_){
              $query
              ->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");
            })
            ->latest('updated_at')
            ->paginate(25);

        }
        elseif($city_id =='empty' && $industry_id !='empty' && $specialisation=='empty')
        {

            $vacancies = Industry::find($industry_id)
            ->GetVacancies()
            ->where(function($query) use ($search_request_){
              $query
              ->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");

            })
            ->latest('updated_at')
            ->paginate(25);
        }
        elseif($city_id !='empty' && $industry_id !='empty' && $specialisation=='empty')
        {
            $vacancies = City::find($city_id)
            ->Vacancies()
            ->where('branch', '=', $industry_id)
            ->where(function($query) use ($search_request_){
              $query->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");

            })
            ->latest('updated_at')
            ->paginate(25);
        }

        elseif($city_id == 'empty' && $industry_id == 'empty' && $specialisation=='empty')
        {
            $vacancies = Vacancy::AllVacancies()
            ->where('position','Like',"%$search_request_%")
            ->orWhere('description','Like',"%$search_request_%")
            ->latest('updated_at')
            ->paginate(25);
        }
        elseif($city_id !='empty' && $industry_id =='empty' && $specialisation!='empty')
        {

          $vacancies =City::find($city_id)
          ->Vacancies()
          ->where('position','=',$specialisation)
          ->where(function($query) use ($search_request_){
            $query
            ->where('position','Like',"%$search_request_%")
            ->orWhere('description','Like',"%$search_request_%");

          })
          ->latest('updated_at')
          ->paginate(25);
          }
        elseif($city_id =='empty' && $industry_id !='empty' && $specialisation!='empty')
        {
            $vacancies = Industry::find($industry_id)
            ->GetVacancies()
            ->where('position','=',$specialisation)
            ->where(function($query) use ($search_request_){
              $query
              ->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");

            })
            ->latest('updated_at')
            ->paginate(25);
        }
        elseif($city_id !='empty' && $industry_id !='empty' && $specialisation!='empty')
        {
            $vacancies = City::find($city_id)
            ->Vacancies()
            ->where('branch', '=', $industry_id)
            ->where('position','=',$specialisation)
            ->where(function($query) use ($search_request_){
              $query
              ->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");

            })
            ->latest('updated_at')
            ->paginate(25);
        }

        elseif($city_id =='empty' && $industry_id =='empty' && $specialisation!='empty')
        {
            $vacancies = Vacancy::AllVacancies()
            ->where('position','=',$specialisation)
            ->where(function($query) use ($search_request_){
              $query
              ->where('position','Like',"%$search_request_%")
              ->orWhere('description','Like',"%$search_request_%");

            })
            ->latest('updated_at')
            ->paginate(25);
        }
        return Response::json(View::make('main.filter.vacancy',
            array(
                  'search_boolean'=> $search_boolean,
                  'vacancies' => $vacancies,
                  'industries' => $industries,
                  'cities' => $cities,
                  'city_id'=>$city_id,
                  'industry_id' => $industry_id,
                  'specialisation'=>  $specialisation,
                  'data'=>$search_request_))->render());
    }

        return View::make('main.filter.filterVacancies', ['vacancies' => $vacancies,
            'cities' => $cities,
            'industries' => $industries,
            'city_f' => $city_id,
            'industry_f' => $industry_id,
			      'specialisation'=>$specialisations,
            'data'=>$search_request,
            'search_boolean'=> $search_boolean]);
    }
/////////////method Search_and_Show Resumes by Position and Description/////////////////////////
    public function showResumes()
    {

        $specialisations = Resume::groupBy('position')
        ->lists('position');
        $industries = Industry::orderBy('name')
        ->get();
        $industry = Input::get('industry_id',0);
        $specialisation = Input::get('specialisation_',0);
        $search_request = Request::input('search_field');
        $search_boolean = 'true';
        $cityModel= new City();
        $cities = $cityModel
        ->getCities();
        $city = Input::get('city_id',0);
        $data = Request::input('search_field');
        $resumes = Resume::latest('updated_at')
        ->where('position','Like',"%$data%")
        ->orWhere('description','Like',"%$data%")
        ->paginate(25);
        if (Request::ajax()) {
            $search_boolean = 'true';
            $search_request_=Request::get('data');

            if($city !='empty' && $industry =='empty' && $specialisation=='empty')
            {

                $resumes = Resume::whereIn('city',[$city, 1])
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif($city !='empty' && $industry !='empty' && $specialisation=='empty')
            {

                $resumes = Resume::whereIn('city' ,[$city, 1])
                ->where('industry', '=', $industry)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif( $city =='empty' && $industry !='empty' && $specialisation=='empty')
            {

                $resumes = Resume::where('industry' , $industry)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif($city =='empty' && $industry =='empty' && $specialisation=='empty')
            {

                $resumes = Resume::latest('updated_at')
                ->where(function($query) use ($search_request_){
                    $query
                    ->where('position','Like',"%$search_request_%")
                    ->orWhere('description','Like',"%$search_request_%");
                  })
                  ->latest('updated_at')
                  ->paginate(25);;
            }
            elseif($city !='empty' && $industry =='empty' && $specialisation!='empty')
            {

                $resumes = Resume::whereIn('city',[$city, 1])
                ->latest('updated_at')
                ->where('position','=',$specialisation)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif($city !='empty' && $industry !='empty' && $specialisation!='empty')
            {

                $resumes = Resume::whereIn('city' ,[$city, 1])
                ->where('industry', '=', $industry)
                ->latest('updated_at')
                ->where('position','=',$specialisation)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif( $city =='empty' && $industry !='empty' && $specialisation!='empty')
            {

                $resumes = Resume::where('industry' , $industry)
                ->latest('updated_at')
                ->where('position','=',$specialisation)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
            }
            elseif($city =='empty' && $industry =='empty' && $specialisation!='empty')
            {

                $resumes = Resume::latest('updated_at')
                ->where('position','=',$specialisation)
                ->where(function($query) use ($search_request_){
                  $query
                  ->where('position','Like',"%$search_request_%")
                  ->orWhere('description','Like',"%$search_request_%");

                })
                ->latest('updated_at')
                ->paginate(25);
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
                    'industry_id' => $industry,
                    'specialisation'=>$specialisations,
                    'data'=>$search_request_,
                    'search_boolean'=> $search_boolean
                  )
            )->render());
        }
        return View::make('main.filter.filterResumes', array(
            'resumes' => $resumes,
            'industries' => $industries,
            'city_id'=>$city,
            'industry_id' => $industry,
            'cities' => $cities,
			      'specialisation'=>$specialisations,
            'data'=>$search_request,
            'search_boolean'=> $search_boolean));
    }


}
