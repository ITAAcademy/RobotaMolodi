<?php namespace App\Http\Controllers;

use App\Models\City;
use Input;
use Request;

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
        public $fakeData = [
            ['data'=>"1"],
            ['data'=>"2"],
            ['data'=>"3"]
        ];
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
        $cities = $cityModel->getCities();
		return view('main.index',['data'=>$this->fakeData, 'cities'=> $cities]);
	}
    public function filter()
    {
        dd($data);
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();
            print_r($data);
            die;
        }
    }

}
