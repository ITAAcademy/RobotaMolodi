<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use \App\Models\Company;
use \App\Models\Resume;
use \App\Models\City;
use \App\Models\User;
use \App\Models\Industry;

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
		$this->call('UserTableSeeder');
        $this->call('ResumeSeeder'); // Заповнення таблиці resumes даними
        $this->call('CitySeeder');
        $this->call('IndustrySeeder');
	}

}



class VacancySeeder extends Seeder
{
    public function Run()
    {

        DB::table('vacancies')->delete();
        for($i = 0; $i < 105; $i++)  {
            $position = rand(1, 5);
            $industry = rand(1, 27);
            $city_r = rand(1, 26);
            switch($position){
                case 1: $pos = "Бухгалтер"; $sal = 10000; break;
                case 2: $pos = "Касир"; $sal = 5000;  break;
                case 3: $pos = "Менеджер"; $sal = 8000;  break;
                case 4: $pos = "Фермер"; $sal = 12000;  break;
                case 5: $pos = "Програміст"; $sal = 25000;  break;
                default: $pos = "Rock"; $sal = 50000;  break;
            }
            switch($position){
                case 1: $com_id = 1;  break;
                case 2: $com_id = 2; break;
                default: $com_id = 3; break;
            }

            Vacancy::create([
                "position" => $pos,
                "company_id" => $com_id,
                "branch" => $industry,
                "date_field" => \Carbon\Carbon::now(),
                "salary" => $sal,
                //"city" => $city_r,
                "description" => $pos." "." bla-bla-bla Зарплата:".$sal]);
        }
    }

}

class CompanySeeder extends Seeder
{
    public function run()
    {

        Company::create([
            "users_id" => 3,
            "id" => 1,
            "company_name" =>'Ciklum',
            "company_email" => 'www.goo'
        ]);
        Company::create([
            "users_id" => 2,
            "id" => 3,
            "company_name" =>'Epam',
            "company_email" => 'www.aaas'
        ]);
        Company::create([
            "users_id" => 1,
            "id" => 2,
            "company_name" =>'Firs',
            "company_email" => 'www.asdadad'
        ]);
    }

}

class ResumeSeeder extends Seeder  // Заповнення таблиці resumes даними
{
    public function run()
    {
        DB::table('resumes')->delete();
        Resume::create([
            'id_u' => 1,
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 'Розробник програмного забезпечення',
            'industry'=> 'Ювелірна' ,
            'city'=> '1',
            'salary'=> 20100,
            'description'=> 'Створення програмного забезпечення для штампу на дорогоцінних металах.',
        ]);

        Resume::create([
            'id_u' => 1,
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 'Програміст С++',
            'industry'=> 'Харчова' ,
            'city'=> '1',
            'salary'=> 20300,
            'description'=> 'Створення програмного забезпечення для конвеєрного виробництва.',
        ]);

        Resume::create([
            'id_u' => 2,
            'name_u'=> 'Сергій Коломієць',
            'telephone'=> '0963363495',
            'email'=> '3sorey4@gmail.com',
            'position'=> 'Програміст С#',
            'industry'=> 'Шкіряна' ,
            'city'=> '1',
            'salary'=> 20500,
            'description'=> 'Створення програми для обчислення розмірів тканин.',
        ]);

    }
}

class CitySeeder extends Seeder
{
   /* $cities = array("Винница", "Днепропетровск", "Донецк", "Житомир", "Запорожье",
                    "Ивано-Франковск", "Киев", "Кировоград", "Луганск", "Луцк",
                    "Львов", "Николаев", "Одесса", "Полтава", "Ровно", "Севастополь",
                   "Симферополь", "Сумы", "Тернополь", "Ужгород", "Харьков", "Херсон",
                   "Хмельницкий", "Черкассы", "Чернигов");
   */

    public function run()
    {
        DB::table("cities")->delete();
        City::create(['name' => "Уся Україна"]);
        City::create(["name" => "Вінниця"]);
        City::create(["name" => "Дніпропетровськ"]);
        City::create(["name" => "Донецьк"]);
        City::create(["name" => "Житомир"]);
        City::create(["name" => "Запоріжжя"]);
        City::create(["name" => "Івано-Франківськ"]);
        City::create(["name" => "Київ"]);
        City::create(["name" => "Кіровоград"]);
        City::create(["name" => "Луганськ"]);
        City::create(["name" => "Луцьк"]);
        City::create(["name" => "Львів"]);
        City::create(["name" => "Миколаїв"]);
        City::create(["name" => "Одеса"]);
        City::create(["name" => "Полтава"]);
        City::create(["name" => "Рівне"]);
        City::create(["name" => "Севастополь"]);
        City::create(["name" => "Сімферополь"]);
        City::create(["name" => "Суми"]);
        City::create(["name" => "Тернопіль"]);
        City::create(["name" => "Ужгород"]);
        City::create(["name" => "Харків"]);
        City::create(["name" => "Херсон"]);
        City::create(["name" => "Хмельницький"]);
        City::create(["name" => "Черкаси"]);
        City::create(["name" => "Чернігів"]);
        City::create(["name" => "Чернівці"]);
    }
}
class IndustrySeeder extends Seeder
{
    public function run()
    {
        DB::table("industries")->delete();
        Industry::create(["name" => "Торгівля/продаж"]);
        Industry::create(["name" => "Інформаційні технології"]);
        Industry::create(["name" => "Керівництво/топ-менеджмент"]);
        Industry::create(["name" => "Менеджери/керівники середньої ланки"]);
        Industry::create(["name" => "Бухгалтерія/банк/фінанси/аудит"]);
        Industry::create(["name" => "Офісний персонал/HR"]);
        Industry::create(["name" => "Реклама/маркетинг/pr"]);
        Industry::create(["name" => "Інженерія/технології"]);
        Industry::create(["name" => "Будівництво/архітектура/нерухомість"]);
        Industry::create(["name" => "Юриспруденція/страхування/консалтинг"]);
        Industry::create(["name" => "Логістика/склад/митниця"]);
        Industry::create(["name" => "Транспорт/служба безпеки/охорона"]);
        Industry::create(["name" => "Поліграфія/дизайн/оформлення"]);
        Industry::create(["name" => "Виробництво/робітничі спеціальності"]);
        Industry::create(["name" => "Краса/фітнес/спорт/туризм"]);
        Industry::create(["name" => "Мистецтво/розваги/шоу-бізнес"]);
        Industry::create(["name" => "Журналістика/редагування/переклади"]);
        Industry::create(["name" => "Освіта/наука/виховання"]);
        Industry::create(["name" => "Сфера обслуговування/кулінарія/готелі/ресторани"]);
        Industry::create(["name" => "Охорона здоров'я/фармацевтика"]);
        Industry::create(["name" => "Сільське господарство/переробка с/г продукції"]);
        Industry::create(["name" => "Домашній персонал/різноробочі"]);
        Industry::create(["name" => "Громадські організації/політичні партії"]);
        Industry::create(["name" => "Екологія/охорона навколишнього середовища"]);
        Industry::create(["name" => "Соціальна сфера"]);
        Industry::create(["name" => "Житлово-комунальне господарство"]);
        Industry::create(["name" => "Стажування за кордоном/програми обміну"]);
    }

}

class UserTableSeeder extends Seeder
{
   public function run()
   {
       DB::table("users")->delete();
       User::truncate();
       User::create([
           'id'=> 1,
           'name'=> 'Sasha',
           'email'=> '3sorey4@gmail.com',
           'password'=> Hash::make( '123456' ),
           ]);
       User::create([
           'id'=> 2,
           'name'=> 'Vova',
           'email'=> '34@gmail.com',
           'password'=> Hash::make( '123456' ),
       ]);

       User::create([
           'id'=> 3,
           'name'=> 'Sergey',
           'email'=> '3sorey@gmail.com',
           'password'=> Hash::make( '123456' ) ,
       ]);


   }
}