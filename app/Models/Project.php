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
    protected $fillable = [ 'name', 'brand',
                            'location', 'bonuses',
                            'company_desc', 'company_about',
                            'project_about', 'project_term',
                            'breaf_desc', 'full_desc'
                        ];
}
