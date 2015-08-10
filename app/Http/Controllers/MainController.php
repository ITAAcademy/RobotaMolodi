<?php namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Vacancy;
use App\Models\Industry;
use Illuminate\Auth\Guard;
use Input;
use Request;
use Session;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller {

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
	public function index(City $cityModel,Guard $auth)
	{

        //dd($auth->user());
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();
        $vacancies = Vacancy::latest('id')->paginate(3);
        Session::forget('city');
        Session::forget('industry');
        //Session::flush();
        return view('main.index',['vacancies'=>$vacancies, 'cities'=>$cities,'industries'=>$industries]);
	}
    public function filters(City $cityModel)
    {
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();

        if(Input::get('industry') || Input::get('city')){
            $city_i = Input::get('city');
            $industry_i = Input::get('industry');
            session(['city' => $city_i, 'industry' => $industry_i]);

        }

        $city = session('city');
        $industry = session('industry');

        if($city > 0 && $industry < 1){
            $vacancies = Vacancy::where('city', '=',$city)->latest('id')->paginate(2);
        }
        elseif($city > 0 && $industry > 0){
            $vacancies = Vacancy::where('city', '=',$city)->where('branch', '=', $industry)->latest('id')->paginate(2);
        }
        elseif( $industry > 0 && $city < 1){
            $vacancies = Vacancy::where('branch', '=', $industry)->latest('id')->paginate(2);
        }
        else
        {
            $vacancies = Vacancy::latest('id')->paginate(3);
        }

        return view('main.filter',
            ['vacancies'=>$vacancies,
            'cities'=>$cities,
            'industries'=>$industries,
            'city_f'=> $city,
            'industry_f'=>$industry]);
    }

}
