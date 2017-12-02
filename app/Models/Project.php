<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'company_id',
                            'industry_id', 'brand',
                            'location', 'bonuses',
                            'company_desc', 'company_about',
                            'project_about', 'project_term',
                            'breaf_desc', 'full_desc'
                        ];

    static public function validationRules()
    {
        return [
            'name'          => 'required|min:3',
            'brand'         => 'required|min:3',
            'logo'          => 'required|image',
            'location'      => 'required|min:3',
            'bonuses'       => 'required|min:3',
            'company_desc'  => 'required|min:3',
            'company_about' => 'required|min:3',
            'project_about' => 'required|min:3',
            'project_term'  => 'required|min:3',
            'breaf_desc'    => 'required|min:3',
            'full_desc'     => 'required|min:3',
            'company_id'    => 'required|integer',
            'industry_id'   => 'required|integer',
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function members()
    {
        return $this->hasMany('App\Models\ProjectMember','project_id');
    }

}
