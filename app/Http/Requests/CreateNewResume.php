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
            'name_u'        => 'required|min:5|max:35',
            'telephone'     => 'alpha_dash|min:6|max:20',
            'email'         => 'required|email',
            'position'      => 'required|min:5|max:55',
            'description'   => 'required|min:5|max:35',
		];
	}

}
