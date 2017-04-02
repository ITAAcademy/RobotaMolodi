<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 21.08.2015
 * Time: 13:53
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Vacancy_City extends Model {

    protected $table = 'vacancy_city';

    protected $fillable = ['vacancy_id', 'city_id'];

    public function FillHole($cities_id,$vacancy_id)
    {
        $cities = $cities_id;

        if(count($cities)<=1)
        {
            Vacancy_City::FillTable($cities[0],$vacancy_id);
            return;
        }
        else
        {
        foreach($cities as $city)
        {
            if($city!=0)
            {
                Vacancy_City::FillTable($city,$vacancy_id);
            }
            }

        }
    }
    private function FillTable($city_id,$vacancy_id)
    {
        $vacancy_city = new Vacancy_City();
        $vacancy_city->city_id = $city_id;
        $vacancy_city->vacancy_id = $vacancy_id;
        $vacancy_city->save();
    }

    public function ShowVacancies($city_id)
    {
        $vacancies = array();
        $vacancy_id = Vacancy_City::where('city_id', '=',$city_id)->latest('updated_at')->get();
        dd($vacancy_id);

//        for($i = 0;$i <=count($vacancy_id);$i++)
//        {
//            $vacancy = Vacancy::where('city_id', '=',$city_id)->latest('updated_at')->get();
//
//        }

        dd($vacancies);
        return $vacancies;

    }



    public function ClearHole($vacancy_id)
    {
        $vacancy_city_list = Vacancy_City::where('vacancy_id', '=',$vacancy_id)->get();
        foreach($vacancy_city_list as $vacancy_city)
        {
            Vacancy_City::destroy($vacancy_city->id);
        }
    }
}