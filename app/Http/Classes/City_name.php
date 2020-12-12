<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 31.05.2019
 * Time: 18:29
 */

namespace App\Http\Classes;

use App\Models\City;
use App\Models\CityCheck;


class City_name
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

    public $array2 = [
        '1'=>['city'=>'Вінниця', 'id'=>1],
        '2'=>['city'=>'Дніпропетровськ', 'id'=>2],
        '3'=>['city'=>'Донецьк', 'id'=>3],
        '4'=>['city'=>'Житомир', 'id'=>4],
        '5'=>['city'=>'Запоріжжя', 'id'=>5],
        '6'=>['city'=>'Івано-Франківськ', 'id'=>6],
        '7'=>['city'=>'Київ', 'id'=>7],
        '8'=>['city'=>'Кіровоград', 'id'=>8],
        '9'=>['city'=>'Луганськ', 'id'=>9],
        '10'=>['city'=>'Луцьк', 'id'=>10],
        '11'=>['city'=>'Львів', 'id'=>11],
        '12'=>['city'=>'Миколаїв', 'id'=>12],
        '13'=>['city'=>'Одеса', 'id'=>13],
        '14'=>['city'=>'Полтава', 'id'=>14],
        '15'=>['city'=>'Рівне', 'id'=>15],
        '16'=>['city'=>'Севастополь', 'id'=>16],
        '17'=>['city'=>'Сімферополь', 'id'=>17],
        '18'=>['city'=>'Суми', 'id'=>18],
        '19'=>['city'=>'Тернопіль', 'id'=>19],
        '20'=>['city'=>'Ужгород', 'id'=>20],
        '21'=>['city'=>'Харків', 'id'=>21],
        '22'=>['city'=>'Херсон', 'id'=>22],
        '23'=>['city'=>'Хмельницкий', 'id'=>23],
        '24'=>['city'=>'Черкаси', 'id'=>24],
        '25'=>['city'=>'Чернігів', 'id'=>25],
    ];

    public function insert($array)
    {
        foreach ($array as $arr)
        {
            CityCheck::updateOrCreate(
                ['cities' => $arr['city']]
            );
        }
    }



    public function searchCity($item)
    {

        $cities = new City();
        $cities = $cities->getCities();

        $city_check = new CityCheck();
        $city_check = $city_check->getCities();


        global $id,$flag;
        foreach ($item as $i) {
            foreach ($cities as $city) {

                if($i == $city['attributes']['name'])
                {
                    $id = $city['attributes']['id'];
                   $flag = true;
                    break;
                }
                $flag = false;

            }
            foreach ($item as $i) {
                foreach ($city_check as $city) {
                    if ($i == $city['attributes']['name']) {
                        $id = $city['attributes']['city_id'];
                        $flag = true;
                        break;
                    }
                    $flag = false;
                }
            }
                switch ($flag){
                    case true: continue;
                    case false:
                        $id = CityCheck::updateOrCreate(
                     ['name' => $i]
                 );
                        $id = $id['attributes']['id'];
                }
        }
        return $id;
    }
}