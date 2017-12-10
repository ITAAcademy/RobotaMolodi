<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVacancyOption extends Model
{
    use ModelValidator;

    protected $table = 'projects_vacancies_options';
    const ESSENTIALSKILLS   = 1;
    const PERSONALSKILLS    = 2;
    const BEPLUS            = 4;
    const FORYOU            = 5;
    const RESPONSIBILITIES  = 6;

    protected $fillable = [
        'vacancy_id',
        'group_id',
        'value'
    ];

    private $rules = [
        'value' => 'required|min:3|max:50',
    ];

    public function vacancy()
    {
        return $this->belongsTo('App\Models\ProjectVacancy', 'vacancy_id');
    }

    public function isValid()
    {
        $validator = Validator::make($this->toArray(), $this->rules);
        return !$validator->fails();
    }

}
