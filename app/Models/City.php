<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
class City extends Model {

    protected $table = 'cities';

    protected $fillable = ['name'];
//Get all cities order by name
    public function getCities()
    {
        $cities = $this->orderBy('id')->get();

        return $cities;
    }

    public function Vacancies()
    {
        return $this->belongsToMany('App\Models\Vacancy','vacancy_city');
    }

}
