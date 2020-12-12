<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 31.05.2019
 * Time: 15:10
 */
namespace App\Http\Services\StoreDB;


use App\Models\Company_city;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Vacancy_City;


class StoreCompVac
{
    public function Store($company, $vacancy)
    {

        $company_id = Company::updateOrCreate(
            ['company_name' => $company['name']],
            ['company_email' => $company['email'],
                'city_id' => $company['city_id'],
                'industry_id' => 2,
                'description' => $company['description'],
                'image' => $company['image'],
                'created_at' => $company['created_at'],
                'updated_at' => $company['updated_at'],
            ]);

        //dd($company['city_id']);

        Company_city::updateOrCreate(

            ['company_id' => $company_id['attributes']['id']],
            ['city_id' => $company['city_id'],
                'created_at' => $company['created_at'],
                'updated_at' => $company['updated_at'],
            ]);

        $vacancy_id = Vacancy::updateOrCreate(
                ['description' => $vacancy['description']],
                ['position' => $vacancy['position'],
                    'salary' => $vacancy['salary'],
                    'company_id' => $company_id['attributes']['id'],
                    'currency_id' => $vacancy['currency_id'],
                    'date_field' => $vacancy['date_field'],
                    'updated_at' => $vacancy['updated_at'],
                ]
            );
        Vacancy_City::updateOrCreate(

            ['vacancy_id' => $vacancy_id['attributes']['id']],
            ['city_id' => $company_id['city_id'],
                'created_at' => $company['created_at'],
                'updated_at' => $company['updated_at'],
            ]);

    }

}