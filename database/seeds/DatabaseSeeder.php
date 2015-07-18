<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use \App\Models\Company;
use \App\Models\Resume;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
     $this->call('VacancySeeder');
        $this->call('CompanySeeder');
		// $this->call('UserTableSeeder');
        $this->call('ResumeSeeder');
	}

}


class VacancySeeder extends Seeder
{
    public function Run()
    {
        //$id = '3';
        $branch = "sasas";
        $organisation = "org2";

        DB::table('vacancies')->delete();
        Vacancy::create([
            //"id" => $id,
            "branch"    => $branch,
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
            //"id" => $company_id,
            "company_name" =>$company_name,
            "company_email" => $company_email
        ]);
    }

}

class ResumeSeeder extends Seeder
{
    public function run()
    {
        DB::table('resumes')->delete();
        Resume::create([
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 1,
            'industry'=> 'Ювелірна' ,
            'city'=> 'Вінниця',
            'salary'=> 20500,
            'description'=> 'Створення програмного забезпечення для штампу на дорогоцінних металах.',
        ]);

        Resume::create([
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 2,
            'industry'=> 'Харчова' ,
            'city'=> 'Вінниця',
            'salary'=> 20500,
            'description'=> 'Створення програмного забезпечення для конвеєрного виробництва.',
        ]);

        Resume::create([
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 3,
            'industry'=> 'Шкіряна' ,
            'city'=> 'Вінниця',
            'salary'=> 20500,
            'description'=> 'Створення програми для обчислення розмірів тканин.',
        ]);

    }
}