<?php

namespace App\Http\Services;


use App\Http\Classes\City_name;
use App\Http\Services\StoreDB\StoreCompVac;

ini_set("max_execution_time", 0);

class ParseJson
{

    public function call($arr)
    {

        foreach ($arr as $value) {
            //dd($value->name);



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
