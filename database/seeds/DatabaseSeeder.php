<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use \App\Models\Company;
use \App\Models\Resume;
use \App\Models\City;
use \App\Models\User;
use \App\Models\Industry;
use App\Models\profOrientation\test1;
use App\Models\Vacancy_City;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('CompanySeeder');
        $this->call('VacancySeeder');
		$this->call('UserTableSeeder');
        $this->call('ResumeSeeder'); // Заповнення таблиці resumes даними
        $this->call('CitySeeder');
        $this->call('IndustrySeeder');
        $this->call('Test1Seeder');
        $this->call('VacancyCitySeeder');
        $this->call(NewsSeeder::class);
	}

}



class VacancySeeder extends Seeder
{
    public function Run()
    {
        DB::table('vacancies')->delete();
        for($i = 0; $i < 105; $i++)  {
            $position = rand(1, 5);
            ($i < 54) ? $industry = 27 : $industry = rand(1,26);
            switch($position){
                case 1: $pos = "Бухгалтер"; $sal = 10000;$All_Ukr_Vac = true; $phone = '0637576222'; break;
                case 2: $pos = "Касир"; $sal = 5000; $All_Ukr_Vac = false;$phone = '0937555522'; break;
                case 3: $pos = "Менеджер"; $sal = 8000;$All_Ukr_Vac = false; $phone = '0507545332'; break;
                case 4: $pos = "Фермер"; $sal = 12000;$All_Ukr_Vac = false; $phone = '0637774433'; break;
                case 5: $pos = "Програміст"; $sal = 25000;$All_Ukr_Vac = false; $phone = '0324535522'; break;
                default: $pos = "Rock"; $sal = 50000; $All_Ukr_Vac = false;$phone = '0655646455'; break;
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
				"telephone" => $phone ,
				'vacancyAllUkraine' => $All_Ukr_Vac,
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
            "company_email" => 'http://www.ciklum.com/'
        ]);
        Company::create([
            "users_id" => 2,
            "id" => 3,
            "company_name" =>'Epam',
            "company_email" => 'http://www.epam.com/'
        ]);
        Company::create([
            "users_id" => 1,
            "id" => 2,
            "company_name" =>'Sitecore',
            "company_email" => 'http://www.sitecore.net/'
        ]);
    }
}

class ResumeSeeder extends Seeder  // Заповнення таблиці resumes даними
{
    public function run()
    {
        DB::table('resumes')->delete();

        for($i = 0; $i < 105; $i++) {
            $position = rand(1, 5);
            $industry = ($i < 54) ?  27 :  rand(1, 26);
            ($i < 54) ? $city = 26 : $city = rand(1,25);
            switch ($position) {
                case 1: $pos = "Бухгалтер"; $sal = 11000; break;
                case 2: $pos = "Тестер"; $sal = 6000;  break;
                case 3: $pos = "Архітектор"; $sal = 9000;  break;
                case 4: $pos = "Фермер талантів"; $sal = 13000;  break;
                case 5: $pos = "VIP Програміст"; $sal = 27000;  break;
                default: $pos = "Rock"; $sal = 50000;  break;
            }
            switch($position){
                case 1; case 2; case 3: $user_id = 1; $name_u = 'Віккі Тестер'; $All_Ukr_Res = true;    $email = '33sorey44@gmail.com'; break;
                case 4:                 $user_id = 2; $name_u = 'Наталі Тестер';  $All_Ukr_Res = false;  $email = 'natasha-badora@yandex.ru'; break;
                case 5:                 $user_id = 3; $name_u = 'Сергій Програмер';$All_Ukr_Res = false; $email = '3sorey4@gmail.com'; break;
                default:                $user_id = 3; $name_u = 'Ларавел Тейлор'; $All_Ukr_Res = false;  $email = '37sorey4@gmail.com'; break;
            }

            Resume::create([
                'id_u' => $user_id,
                'name_u' => $name_u,
                'telephone' => '0963363496',
                'email' => $email,
                'position' => $pos,
                'industry' => $industry,
                'city' => $city,
                'salary' => $sal,
				'resumeAllUkraine' => $All_Ukr_Res,
                'description' => $pos.' програмного забезпечення. Оплата праці:'.$sal,
            ]);
        }
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

class VacancyCitySeeder extends Seeder
{
    public function run()
    {
        DB::table("vacancy_city")->delete();

        for($i = 1;$i < 106;$i++)
        {
            ($i < 54) ? $city = 26 : $city = rand(1,25);    //  if($i < 54) $city = 27; else $city = rand(1,26);
            Vacancy_City::create([
                'vacancy_id' => $i,
                'city_id' => $city
            ]);
        }
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
           'name'=> 'Viki Тестер',
           'email'=> '33sorey44@gmail.com',
           'password'=> Hash::make( '123456' ),
           ]);
       User::create([
           'id'=> 2,
           'name'=> 'Natali Тестер',
           'email'=> 'natasha-badora@yandex.ru',
           'password'=> Hash::make( '123456' ),
       ]);
       User::create([
           'id'=> 3,
           'name'=> 'Sorey Програмер',
           'email'=> '3sorey4@gmail.com',
           'password'=> Hash::make( '123456' ),
       ]);
   }
}

class Test1Seeder extends Seeder
{
    public function run()
    {
        DB::table("po_test1")->delete();

        test1::create([
            'text' => 'У своїх розповідях я люблю "прикрашати" події.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Я не люблю знаходитись серед людей, це мене напружує.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Якщо мені вчинили зло, я зазвичай довго це пам`ятаю.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Мене легко образити.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Мене обурює, коли беруть мої речі або порушують мої законні права.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Мені важко боротися зі своєю роздратованістю.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'У мене часто буває піднесений настрій.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Я не вважаю себе людиною, що вміє радувати інших.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Як правило, я довго сумніваюсь і все зважую перед тим, як зробити вибір і прийняти рішення.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я легко копіюю жести і міміку оточуючих.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'В компанії я часто буваю "білою вороною".',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Лінивих і недисциплінованих - не люблю. Говорити здатна більшість, а по-справжньому працювати вміють небагато людей.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'У мене часто змінюється настрій.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Я не люблю пусті високі мрії і надаю перевагу жити реальним життям. "Краще чоботи почистити...".',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Я часто відчуваю втому і загальну слабкість.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Мої друзі дивуються моїй бадьорості і готовності працювати.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Навіть коли я не хворий, почуваю себе недобре.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Я вірю в прикмети: навіть якщо це й смішно, я завжди їх дотримуюсь.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я люблю фантазувати, складати сцени і розігрувати ролі своїх уявних героїв.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Мене часто непокоїть мо душевна пустота, холодність, нездатність співпереживати близькій людині.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Я знаю, як багато серед людей заздрісних, корисливих і недружелюбних.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Я легко переходжу від сліз до сміху.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Я іноді злюсь так, що втрачаю над собою будь-який контроль.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Я доволі закомплексований і намагаюсь це приховати.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Я люблю спілкування з людьми.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Песиміст - це добре поінформована людина.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Я часто непокоюсь, що зі мною або з моїми близькими щось трапиться.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я люблю бути в центрі уваги.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Навіть знаходячись в колі людей, я зазвичай почуваю себе відокремленим та самотнім.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Зі мною часто не погоджуються, але врешті решт виявляється, що саме я правий.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Іноді я лягаю спати в гарному настрої, а просинаюсь - в поганому.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Нерідко на мене находить стан, коли до мене краще не підходити: на душі злість та роздратування.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'У мене схильність до головного болю.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'В житті не існує безвихідних ситуацій, треба лише вірити в перемогу.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Мені часто не щастить, і я до цього уже звик.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Буває, мені важко заснути після того, як я цілий день думав про майбутнє або над якоюсь проблемою.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я люблю знайомитись з людьми.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Я часто не знаю, про що розмовляти з людиною.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Мене вважають енергійним, цілеспрямованим, що вміє досягати успіхів.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Мої вчинки залежать від настрою.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Можливо, я ревнивий, але зраду не пробачаю, по крайній мірі - в душі.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Я дуже переживаю, коли мені роблять зауваження при людях.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Можливо, я дійсно по життю розкидаюсь, але ж так хочеться спробувати всього!',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Зранку мені важко вставати:здається й встав, але потім ще довго почуваю себе в`яло.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Я не можу здати роботу, поки не перевірю і не буду впевненим, що все зробив саме так, як потрібно.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я легко можу при бажанні ніби вселитися в іншу людину, і відчути те, що відчуває інша людина.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Я часто спостерігаю за подіями та собою зі сторони.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Так, я ревнивий, але нічого не поробиш.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'У людях я передусім ціную душевність, щиросердність і теплоту.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Я не люблю давати свої книжки або інші речі, а якщо й даю, то слідкую, щоб їх повернули вчасно і в належному стані.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Коли мені доводиться виступати перед людьми, я сильно хвилююсь і боюсь сказати щось не те чи не так.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Я часто буваю ніби заведений, внутрішньо стурбований і обов`язково повинен щось зробити.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Я іноді помічаю, що час ніби зупиняється і починає текти повільно-повільно.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Іноді до мене прив`язується якась стороння думка, і я кілька днів не можу від неї відволіктись.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Я можу захворіти лише від одних переживань.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Мені часто приходять в голову незвичайні, дивні для оточуючих думки та асоціації.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Нема ворогів у того, хто нічого не робить. У мене вороги є.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Мабуть я м`яка людина, але я завжди слухаюсь свого серця.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Я люблю писати красиво та акуратно.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Я іноді втомлююсь так сильно, що у мене починає крутитися голова.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Якщо трапляються прикрі речі, я про них швидко забуваю.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Мене часто навідує стан апатії, байдужості до усього і навіть до себе самого.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Я не люблю помилятись, і підготовчу чорнову роботу я готую так само старанно, як і основну.',
            'group' => 9,
        ]);
        test1::create([
            'text' => 'Якщо я захоплююся, то завжди починаю вірити у все, про що кажу.',
            'group' => 1,
        ]);
        test1::create([
            'text' => 'Іноді у мене виникає відчуття, що все навколо нереальне.',
            'group' => 2,
        ]);
        test1::create([
            'text' => 'Багатьом не подобається, що я буваю різким та впертим, але майже завжди це справедливо і корисно для справи.',
            'group' => 3,
        ]);
        test1::create([
            'text' => 'Багато хто вважає мене наївним та занадто вразливим.',
            'group' => 4,
        ]);
        test1::create([
            'text' => 'Є люди, які мене бояться і хочуть підставити мені підніжку.',
            'group' => 5,
        ]);
        test1::create([
            'text' => 'Мені не вистачає впевненості у собі.',
            'group' => 6,
        ]);
        test1::create([
            'text' => 'Часом я багато кажу, і мені складно зупинитись.',
            'group' => 7,
        ]);
        test1::create([
            'text' => 'Чого в мені немає, так це любові до життя.',
            'group' => 8,
        ]);
        test1::create([
            'text' => 'Я дуже переживаю, коли не зміг все передбачити і підвів оточуючих.',
            'group' => 9,
        ]);

    }
}
