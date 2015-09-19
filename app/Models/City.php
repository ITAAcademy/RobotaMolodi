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
//        DB::table('vacancies')
//            ->join('vacancy_city', function($join)
//            {
//                $join->on('vacancy_city.vacancy_id', '=', '5');
////                    ->where('vacancies.branch', '=', 5);
//            })
//            ->get();
//        DB::table('vacancies')
//            ->join('vacancy_city', 'vacancy_city.city_id', '=', $cityId)//->and('vacancy_city.vacancy_id', '=', 'vacancies.id')
//            ->join('industries', 'vacancies.branch', '=', 'vacancies.branch')
//            ->select('vacancies.id')
//        ->get();
        return DB::table('vacancies')->select('vacancies.id')->join('vacancy_city', 'vacancy_city.vacancy_id', '=','vacancies.id')->
        where('vacancy_city.city_id','=',$cityId)
        ->where('vacancies.branch','=',$industryId)
        ->get();
    }
}
