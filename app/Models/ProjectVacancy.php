<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVacancy extends Model
{
    use ModelValidator;

    protected $table = 'projects_vacancies';
    protected $fillable = [
        'name',
        'description',
        'total',
        'free'
    ];

    private $rules = [
        'name'        => 'required|min:3|max:32',
        'description' => 'required|min:3|max:255',
        'total'       => 'required|integer',
        'free'        => 'required|integer',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function options()
    {
        return $this->hasMany('App\Models\ProjectVacancyOption','vacancy_id');
    }

    public function isValid()
    {
        $validator = Validator::make($this->toArray(), $this->rules);
        return !$validator->fails();
    }

    public function getGroup()
    {
        return [
            ProjectVacancyOption::ESSENTIALSKILLS => 'Essential skills',
            ProjectVacancyOption::PERSONALSKILLS => 'Personal skills',
            ProjectVacancyOption::BEPLUS => 'Would be a good plus',
            ProjectVacancyOption::FORYOU => 'What’s in it for you',
            ProjectVacancyOption::RESPONSIBILITIES => 'Responsibilities',
        ];
    }

    public function getOptions($type)
    {
        return $this->options()->where('group_id',$type)->get();
    }


    public function toArray()
    {
        if($this->getError() === null)
            $error = [];
        else
            $error = $this->getError();

        $instace = parent::toArray();
        $instace['error'] = $error;

        return $instace;
    }

}
