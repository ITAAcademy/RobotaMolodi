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

    public function getEssentialSkills()
    {
        return $this->options()->where('group_id',\App\Models\ProjectVacancyOption::ESSENTIALSKILLS)->get();
    }

    public function getPersonalSkills()
    {
        return $this->options()->where('group_id',\App\Models\ProjectVacancyOption::PERSONALSKILLS)->get();
    }

    public function getBePlus()
    {
        return $this->options()->where('group_id',\App\Models\ProjectVacancyOption::BEPLUS)->get();
    }

    public function getForYou()
    {
        return $this->options()->where('group_id',\App\Models\ProjectVacancyOption::FORYOU)->get();
    }

    public function getResponsibilities()
    {
        return $this->options()->where('group_id',\App\Models\ProjectVacancyOption::RESPONSIBILITIES)->get();
    }

}
