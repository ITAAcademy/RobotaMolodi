<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 02.09.2015
 * Time: 13:15
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FilterVacanciesModels  extends Model{

    protected $table = 'filterVacancies';
    protected $fillable = ['id', 'position', 'company_id', 'branch',
                            'date_field', 'salary', 'description',
                            'user_email', 'updated_at', 'created_at'];
    public function FillTable($vacancies)
    {
        foreach($vacancies as $vacancy)
        {
            $filterVacancy = new FilterVacanciesModels();

            $filterVacancy->id = $vacancy->id;
            $filterVacancy->position = $vacancy->position;
            $filterVacancy->company_id = $vacancy->company_id;
            $filterVacancy->branch = $vacancy->branch;
            $filterVacancy->date_field = $vacancy->date_field;
            $filterVacancy->salary = $vacancy->salary;
            $filterVacancy->description = $vacancy->description;
            $filterVacancy->user_email = $vacancy->user_email;

            $filterVacancy->save();
        }
    }

    public function DestroyData()
    {
        $filterVacancy = FilterVacanciesModels::all();

        foreach($filterVacancy as $vacancy)
        {
            FilterVacanciesModels::destroy($vacancy->id);
        }

    }
}