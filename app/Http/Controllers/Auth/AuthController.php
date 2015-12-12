<?php
namespace App\Http\Controllers\Auth;
// namespace;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	protected $redirectTo = '/';
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
	// public function __construct(Guard $auth, Registrar $registrar)
	public function __construct()
	{

		// $this->auth = $auth;
		// $this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLastRoute(){
		return redirect()->back();
	}
//	public function redirectPath()
//	{
//		return redirect()->back();
//	}
		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param  array  $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		public function validator(array $data)
		{
			return Validator::make($data, [
		//			'name' => 'required|max:255|alpha',
		//			'email' => 'required|email|max:255|unique:users',
		//			'password' => 'required|confirmed|min:6',
				'name' => 'required|max:30|regex:/[^a-z,A-Z,0-9,�-������,�-߲���,-,_,]/',
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
}
