<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVacancyOption extends Model
{
    use ModelValidator;

    protected $table = 'projects_vacancies_options';
    const ESSENTIALSKILLS   = 1;
    const PERSONALSKILLS    = 2;
    const BEPLUS            = 3;
    const FORYOU            = 4;
    const RESPONSIBILITIES  = 5;

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


    public function toArray()
    {
        if($this->getError() === null)
            $error = [];
        else
            $error = $this->getError()->toArray();
        $instance = [];

        $instance['id']    = $this->id;
        $instance['value'] = $this->value;
        $instance['error'] = $error;

        return $instance;
    }

    public function setCompositeKey($rooId)
    {
        if(!is_null($rooId))
        {
            $this->vacancy_id = $rooId;
        }
    }

}
