<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\profOrientation\UserSession;
use Illuminate\Http\Request;
use App\Models\profOrientation\test1;
use Illuminate\Support\Facades\Redirect;

class ProfOrientationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    	return view('ProfOrientation.main');
	}

    public function StartTest(Request $request)
    {

        $name = $request['name'];
        $sex = $request['sex'];
        $userSession = new UserSession($name,$sex);
        //dd($userSession);
        $test = new test1();
        $test->StartTest($name,$sex,$userSession);

        return view('ProfOrientation.Test1')->with('user',$userSession);
    }

    public function ShowTest()
    {

    }
    public function testValidate(Request $request)
    {

        dd($request->all());
        return view('ProfOrientation.testValidate');
    }
}
