<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_city extends Model
{
    protected $table = 'company_city';

    protected $fillable = ['company_id', 'city_id'];

    private function FillTable($city_id,$company_id)
    {
        $company_city = new Vacancy_City();
        $company_city->city_id = $city_id;
        $company_city->vacancy_id = $company_id;
        $company_city->save();
    }

    public function FillHole($cities_id,$company_id)
    {
        $cities = $cities_id;

        if(count($cities)<=1)
        {
            Company_city::FillTable($cities[0],$company_id);
            return;
        }
        else
        {
            foreach($cities as $city)
            {
                if($city!=0)
                {
                    Company_city::FillTable($city,$company_id);
                }
            }

        }
    }
}
