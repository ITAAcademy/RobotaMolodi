<?php

namespace App\Http\Services;


use App\Http\Classes\City_name;
use App\Http\Services\StoreDB\StoreCompVac;

ini_set("max_execution_time", 0);

class ParseJson
{
    public $array1 = [
        '1'=>['city'=>'Винница', 'id'=>1],
        '2'=>['city'=>'Днепр', 'id'=>2],
        '3'=>['city'=>'Донецк', 'id'=>3],
        '4'=>['city'=>'Житомир', 'id'=>4],
        '5'=>['city'=>'Запорожье', 'id'=>5],
        '6'=>['city'=>'Ивано-Франковск', 'id'=>6],
        '7'=>['city'=>'Киев', 'id'=>7],
        '8'=>['city'=>'Кировоград', 'id'=>8],
        '9'=>['city'=>'Луганск', 'id'=>9],
        '10'=>['city'=>'Луцк', 'id'=>10],
        '11'=>['city'=>'Львов', 'id'=>11],
        '12'=>['city'=>'Николаев', 'id'=>12],
        '13'=>['city'=>'Одесса', 'id'=>13],
        '14'=>['city'=>'Полтава', 'id'=>14],
        '15'=>['city'=>'Ровно', 'id'=>15],
        '16'=>['city'=>'Севастополь', 'id'=>16],
        '17'=>['city'=>'Симферополь', 'id'=>17],
        '18'=>['city'=>'Сумы', 'id'=>18],
        '19'=>['city'=>'Тернополь', 'id'=>19],
        '20'=>['city'=>'Ужгород', 'id'=>20],
        '21'=>['city'=>'Харьков', 'id'=>21],
        '22'=>['city'=>'Херсон', 'id'=>22],
        '23'=>['city'=>'Хмельницкий', 'id'=>23],
        '24'=>['city'=>'Черкассы', 'id'=>24],
        '25'=>['city'=>'Чернигов', 'id'=>25],
    ];
    public function call($arr)
    {

        foreach ($arr as $value) {



            $item = $value->city;
            $item = str_replace(' ', '', $item);
            $item = explode(",", $item);
            $cityName = new City_name();
            $id = $cityName->searchCity($item);

            


////////////////////////////////////////////////////////////////


             $company = [
                 'name' => $value->company->name,
                 'email' => $value->company->site,
                 'city_id' => $id,
                 'description' => $value->company->description,
                 'image' => $value->company->logo,
                 'created_at' => $value->company->created_at,
                 'updated_at' =>$value->company->updated_at
             ];




             switch($value->salary_unit){
                 case '$':
                     $item = 2;
                     break;
                 case '€':
                     $item = 3;
                     break;
                 case '₴':
                     $item = 1;
                     break;

                 default: $item = 1;
             }


             $vacancy = [
                     'position' => $value->name,
                     'salary' => $value->salary,
                     'currency_id' => $item,
                     'date_field' => $value->date,
                     'description' => $value->description,
                     'updated_at' => $value->updated_at,
                 ];


             $storeVacancy = new StoreCompVac();
             $storeVacancy->Store($company, $vacancy);


        }

    }

}
