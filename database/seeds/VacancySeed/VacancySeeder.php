<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 14.06.2015
 * Time: 13:39
 */
class VacancySeeder extends Seeder
{
    public function Run()
    {
        $id = '3';
        $branch = "sasas";
        $organisation = "org2";

        DB::table('vacancies')->delete();
        Vacancy::create([
            "company_id" => $id,
            "bfranch"    => $branch,
            "organisation"=> $organisation,
            "date_field"=>"12.01.123",
            "salary"=>"3000",
            "city"=>"Vinnytsa",
            "description"=>"bla-bla-bla"
        ]);
    }

}
