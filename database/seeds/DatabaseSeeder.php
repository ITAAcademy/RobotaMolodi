<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use \App\Models\Company;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        //$this->call('VacancySeeder');
        $this->call('CompanySeeder');
		// $this->call('UserTableSeeder');
	}

}


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
            "description"=>"bla-bla-bla"]);
    }

}

class CompanySeeder extends Seeder
{
    public function run()
    {
        $company_id = '2';
        $company_name = "Sasha";
        $company_email = "1989alpan@gmail.com";
        //DB::table("company")->delete();
        Company::create([
            "company_id" => $company_id,
            "company_name" =>$company_name,
            "company_email" => $company_email
        ]);
    }

}