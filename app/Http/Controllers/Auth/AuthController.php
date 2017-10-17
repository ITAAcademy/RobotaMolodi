<?php
namespace App\Http\Controllers\Auth;

use View;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller {

	protected $redirectPath = '/resume';
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */

	public function __construct()
	{

        $this->middleware('guest', ['except' => 'getLogout']);

	}

	public function getLastRoute(){
		return Redirect::intended();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:30|regex:/^[Є-Їa-zа-я_\-\'\`]+$/iu',
			'email' => 'required|email|max:30|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */

	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

	protected function getFailedLoginMessage()
	{
		return 'Check the correct of your email or password';
	}

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        /*
           after Auth::login $validator->fails() set TRUE. Why?
           that why $isFail variable is existing.
        */
        $isFail = $validator->fails();
        $errors = false;
        if ($isFail)
        {
            $view = View::make('errors.validation',['errors' => $validator->errors()->all()]);
            $errors = $view->render();
        } else {
            Auth::login($this->create($request->all()));
        }

        return response()->json(array(
            'success' => !$isFail,
            'route'   => url($this->redirectPath()),
            'errors'  => $errors
        ));
    }

}
