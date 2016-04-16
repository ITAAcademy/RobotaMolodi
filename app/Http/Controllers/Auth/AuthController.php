<?php
namespace App\Http\Controllers\Auth;
// namespace;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

	public function getLogin()
	{
		if (isset($_SERVER['HTTP_REFERER']))
			$test = $_SERVER['HTTP_REFERER'];
		else
			$test = null;

		session(['key' => $test]);
		return view('auth.login');
	}


	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $this->getCredentials($request);

		if (Auth::attempt($credentials, $request->has('remember'))) {
			if (session('redirect')!=null)
				return Redirect::to(session('key'));
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('email', 'remember'))
			->withErrors([
				'email' => $this->getFailedLoginMessage(),
			]);
	}




	public function __construct()
	{

		// $this->auth = $auth;
		// $this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);

	}

	public function getLastRoute(){
		return Redirect::intended();
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
				'name' => 'required|max:30|regex:/^[йцукенгшщзхъэждлорпавыфячсмитьбюєїіёЁЙЦУКЕНГШЩЗХЪЭЖДЛОРПАВЫФЯЧСМИТЬБЮЇІЄa-zA-Z_\-\'\`]+$/',
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


