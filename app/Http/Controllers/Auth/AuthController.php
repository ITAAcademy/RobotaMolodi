<?php
namespace App\Http\Controllers\Auth;
// namespace;

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
	// public function __construct(Guard $auth, Registrar $registrar)




	public function __construct()
	{

        $this->middleware('guest', ['except' => 'getLogout']);


	}

	public function getLastRoute(){
		return Redirect::intended();
	}

//
//	public function redirectPath()
//	{
//		$test = Cookie::get('url');
//		if (Cookie::get('url')!='')
//			return redirect(Cookie::get('name'));
//		else
//			return redirect('/');
//	}
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

		protected function getFailedLoginMessage()
    	{
        return 'Check the correct of your email or password';
    	}


}


