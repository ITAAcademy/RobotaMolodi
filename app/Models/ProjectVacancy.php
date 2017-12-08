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
}
