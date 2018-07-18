<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\SocialAccount;
use Illuminate\Support\Facades\DB;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

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
    protected $fillable = ['name', 'email', 'password', 'service', 'access_token', 'uuid', 'refresh_token', 'provider_user_id', 'provider', 'avatar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     */

    protected $hidden = ['password', 'remember_token'];

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'users_id');
    }

    public function projects()
    {
        return $this->hasManyThrough('App\Models\Project', 'App\Models\Company', 'users_id', 'company_id')->orderBy('updated_at', 'desc');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function hasAnyCompany()
    {
        $hasAnyCompany = User::companies();

        return $hasAnyCompany;
    }

    public function ReadUserVacancies()
    {
        $vacancies = $this->hasManyThrough('App\Models\Vacancy', 'App\Models\Company', 'users_id')->orderBy('updated_at', 'desc');

        return $vacancies;
    }

    public function resumes()
    {
        return $this->hasMany('App\Models\Resume', 'user_id');
    }

    public function GetResumes()
    {
        $userResumes = User::resumes()->orderBy('updated_at', 'desc');

        return $userResumes;
    }

    public function scopeResume()
    {

        return $this->GetResumes();

    }

    public function GetCompanies()
    {
        $userCompanies = User::companies()->latest('updated_at');

        return $userCompanies;
    }

    public function isAdmin()
    {
        if (isset($this->role_id)) {
            return $this->role_id == Role::ADMIN;
        }
        return false;
    }

    public function isAdwiser()
    {
        if (isset($this->role_id)) {
            return $this->role_id == Role::ADWISER;
        }
        return false;
    }

    public function accounts()
    {

        return $this->hasMany('App\SocialAccount');
    }

    public function getAvatarPath()
    {
        return 'image/user/' . $this->id . '/avatar/' . $this->avatar;
    }
    public function consult(){
        return $this->hasOne('App\Consult', 'consult_id', 'id');
    }
}
