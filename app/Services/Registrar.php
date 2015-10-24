<?php namespace App\Services;

use App\Models\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

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
				'name' => 'required|max:30|regex:pattern',//"/[^a-z,A-Z,0-9,à-ÿ³¿º´ú,À-ß²¯ª¥,-,_,']/"',
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
