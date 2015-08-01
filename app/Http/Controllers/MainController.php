<?php namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Vacancy;
use App\Models\Industry;
use Input;
use Request;
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
//        public $fakeData = [
//            ['data'=>"1"],
//            ['data'=>"2"],
//            ['data'=>"3"]
//        ];
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
	public function index(City $cityModel)
	{
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();
        $vacancies = Vacancy::latest('id')->paginate(10);

        //var_dump($vacancies);
       // print_r($vacancies);

		//return view('main.index',['data'=>$this->fakeData, 'cities'=>$cities,'industries'=>$industries]);
        return view('main.index',['vacancies'=>$vacancies, 'cities'=>$cities,'industries'=>$industries]);
	}
    public function filters(City $cityModel)
    {
        $industries = Industry::orderBy('name')->get();
        $cities = $cityModel->getCities();


        $data1 = Input::all();
        //var_dump($data1);

            if($data1['city'] > 0 && $data1['industry'] == 0){
                $vacancies = Vacancy::where('city', '=',$data1['city'])->latest('id')->paginate(2);
                //$vacancies = Vacancy::where('city', '=',$data1['city_id'])->latest('id')->paginate(4);

            }
            elseif($data1['city'] > 0 && $data1['industry'] > 0){
                $vacancies = Vacancy::where('city', '=',$data1['city'])->where('branch', '=', $data1['industry'])->latest('id')->paginate(2);
            }
            elseif( $data1['industry'] > 0 && $data1['city'] == 0){
                $vacancies = Vacancy::where('branch', '=', $data1['industry'])->latest('id')->paginate(2);
            }
            else
            {
                $vacancies = Vacancy::latest('id')->paginate(2);
            }
        //$vacancies->setPath('filter/');
        //return Redirect::to('main.filters',['vacancies'=>$vacancies, 'cities'=>$cities,'industries'=>$industries]);
        return view('main.index',['vacancies'=>$vacancies, 'cities'=>$cities,'industries'=>$industries]);
        //return view('main.index')->with('vacancies', $vacancies)->render();
    }
//    public function filter()
//    {
//        if (Request::ajax()) {
//            $data1 = Input::all();
//
//            if($data1['city_id'] > 0 && $data1['industry_id'] == 0){
//                $vacancies = Vacancy::where('city', '=',$data1['city_id'])->latest('id')->get();
//                //$vacancies = Vacancy::where('city', '=',$data1['city_id'])->latest('id')->paginate(4);
//
//            }
//            elseif($data1['city_id'] > 0 && $data1['industry_id'] > 0){
//                $vacancies = Vacancy::where('city', '=',$data1['city_id'])->where('branch', '=', $data1['industry_id'])->latest('id')->get();
//            }
//            elseif( $data1['industry_id'] > 0 && $data1['city_id'] == 0){
//                $vacancies = Vacancy::where('branch', '=', $data1['industry_id'])->latest('id')->get();
//            }
//            else
//            {
//                $vacancies = Vacancy::latest('id')->get();
//            }
//            //return view('main.index',['vacancies'=>$vacancies]);
//            header("Content-type: text/x-json");
//            echo json_encode($vacancies);
//            exit();
//        }
//    }
        //$vacancies = DB::select('select * from vacancies where city = (select cities.name from cities where id = ?)', $city_id)->get();
}
