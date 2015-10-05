<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use DB;
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

    public function GetCollection($cityId,$industryId)
    {
        return DB::table('vacancies')->select()->join('vacancy_city', 'vacancy_city.vacancy_id', '=','vacancies.id')->
        where('vacancy_city.city_id','=',$cityId)
        ->where('vacancies.branch','=',$industryId)
        ->get();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Scope
    public function scopeGetCityName($id)
    {
        $res = City::find($id);
        dd($res);
        return $res;
    }
}
