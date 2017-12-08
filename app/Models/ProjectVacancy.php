<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVacancy extends Model
{
    protected $table = 'projects_vacancies';
    protected $fillable = [
        'name',
        'description',
        'total',
        'free'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function options()
    {
        return $this->hasMany('App\Models\ProjectVacancyOption','vacancy_id');
    }

}
