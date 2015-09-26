<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNewResume extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            //'position','telephone','email', 'name_u', 'industry', 'salary','city', 'description',
            'name_u'        => 'required|min:3|max:255|alpha',
            'telephone'     => 'min:5|max:30',
            'email'         => 'required|email',
            'position'      => 'required|min:5|max:80',
            'salary'        => 'required|integer|min:100|max:500000',
            'description'   => 'required|min:5|max:2028',
		];
	}

}
