<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use ModelValidator;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',       'company_desc',
        'location',   'project_about',
        'brand',      'company_about',
        'bonuses',    'project_term',
        'full_desc',  'brief_desc',
        'company_id', 'industry_id'
    ];

    /**
    * The value is containes validation's rules.
    *
    * @var array
    */
    private $rules = [
       'name'          => 'required|string|min:3|max:32|regex:/^[\d Є-Їa-zа-я_\-\'\`]+$/iu',
       'brand'         => 'required|string|min:3|max:32',
       'location'      => 'required|string|min:3|max:32',
       'bonuses'       => 'required|string|min:3|max:32',
       'company_desc'  => 'required|string|min:3|max:255',
       'company_about' => 'required|string|min:3|max:255',
       'project_about' => 'required|string|min:3|max:255',
       'project_term'  => 'required|string|min:3|max:32',
       'brief_desc'    => 'required|string|min:3|max:32',
       'full_desc'     => 'required|string|min:3|max:255',
       'company_id'    => 'required|integer',
       'industry_id'   => 'required|integer'
    ];

    public function isOwner($userId){
        if($userId ===  $this->company->user->id)
            return true;
        else
            return false;
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industry_id');
    }

    public function members()
    {
        return $this->hasMany('App\Models\ProjectMember','project_id');
    }

    public function vacancies()
    {
        return $this->hasMany('App\Models\ProjectVacancy','project_id');
    }

    public function toArray()
    {
        if($this->getError() === null)
            $error = [];
        else
            $error = $this->getError()->toArray();

        $instace = parent::toArray();
        $instace['error'] = $error;

        return $instace;
    }

    public function setCompositeKey($rootId)
    {
        return true;
    }

}
