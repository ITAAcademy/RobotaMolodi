<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVacancyOption extends Model
{
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
}
