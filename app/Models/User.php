<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
     *
	 */

	protected $hidden = ['password', 'remember_token'];

    private function hasCompany()
    {
       return $this->hasMany('App\Models\Company','users_id')->get();

    }

    public function hasAnyCompany()
    {
        $hasAnyCompany = User::hasCompany();

        return $hasAnyCompany;
    }

    public function ReadUserVacancies()
    {
        $vacancies = $this->hasManyThrough('App\Models\Vacancy', 'App\Models\Company','users_id')->get();

        return $vacancies;
    }

    private function HasManyResumes()
    {
        return $this->hasMany('App\Models\Resume','id_u')->get();
    }

    public function GetResumes()
    {
        $userResumes = User::HasManyResumes();

        //dd($userResumes);
//        $resumes = array();
//        foreach($userResumes as $resume)
//        {
//            array_push($resumes,$resume);
//        }

        return $userResumes;
    }



}
