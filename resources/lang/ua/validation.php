<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute повинен бути прийнятий",
	"active_url"           => ":attribute не є дійсною URL-адресою.",
	"after"                => ":attribute повинно бути датою після :date.",
	"alpha"                => ":attribute може містити лише літери.",
	"alpha_dash"           => ":attribute може містити лише літери, цифри та дефіси.",
	"alpha_num"            => ":attribute може містити лише літери та цифри.",
	"array"                => ":attribute повинен бути масив.",
	"before"               => ":attribute повинено бути датою раніше :date.",
	"between"              => [
		"numeric" => ":attribute повинен бути між :min і :max.",
		"file"    => ":attribute повинен бути між :min and :max кілобайт.",
		"string"  => ":attribute повинен бути між :min and :max літерами.",
		"array"   => ":attribute повинен бути між :min and :max елементами.",
	],
	"boolean"              => ":attribute поле має бути істинним чи хибним.",
	"confirmed"            => ":attribute підтвердження не збігається",
	"date"                 => ":attribute не є дійсною датою.",
	"date_format"          => ":attribute не відповідає формату :format.",
	"different"            => ":attribute і :other повинні бути різними.",
	"digits"               => ":attribute повинно бути :digits цифри.",
	"digits_between"       => ":attribute овинен бути між :min and :max цифри.",
	"email"                => ":attribute повинна бути дійсною електронною адресою.",
	"filled"               => ":attribute поле обов'язкове.",
	"exists"               => "Вибраний :attribute недійсний.",
	"image"                => ":attribute повинен бути зображенням.",
	"in"                   => "Вибраний :attribute недійсний",
	"integer"              => ":attribute повинен бути цілим числом.",
	"ip"                   => ":attribute повинна бути дійсною IP-адресою.",
	"max"                  => [
		"numeric" => "Поле не може мати значення більше :max.",
		"file"    => ":attribute не може бути більшим за :max кілобайт.",
		"string"  => ":attribute не може бути більшим за :max символів.",
		"array"   => ":attribute може бути не більше ніж :max елементів.",
	],
	"mimes"                => ":attribute повинен бути файлом типу: :values.",
	"min"                  => [
		"numeric" => ":attribute повинен бути принаймні :min.",
		"file"    => ":attribute повинен бути принаймні :min кілобайт.",
		"string"  => ":attribute повинен бути принаймні :min characters.",
		"array"   => ":attribute повинен мати принаймні :min елементів.",
	],
	"not_in"               => "Вибраний :attribute недійсний.",
	"numeric"              => ":attribute повинен бути числом.",
	"regex"                => ":attribute формат недійсний.",
	"required"             => ":attribute поле обов'язкове.",
	"required_if"          => ":attribute поле потрібне, коли :other є :value.",
	"required_with"        => ":attribute поле потрібне, коли :values присутній.",
	"required_with_all"    => ":attribute поле потрібне, коли :values присутній.",
	"required_without"     => ":attribute поле потрібне, коли :values немає.",
	"required_without_all" => ":attribute поле потрібне, коли ніяке з :values присутні.",
	"same"                 => ":attribute і :other повинні відповідати.",
	"size"                 => [
		"numeric" => ":attribute повинно бути :size.",
		"file"    => ":attribute повинно бути :size кілобайт.",
		"string"  => ":attribute повинно бути :size символів.",
		"array"   => ":attribute повинен містити :size елементів.",
	],
	"unique"               => ":attribute вже існує.",
	"url"                  => ":attribute формат недійсний.",
	"timezone"             => ":attribute повинна бути дійсною зоною.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
	    'login' => 'Перевірте правильність вашої електронної пошти або пароля',
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
        'email' => [
            'required' => 'Поле "email" обов\'язкове для заповнення!',
            'email' => 'Введіть коректний email!',
			'max' => 'Поле повинно містити максимум 255 символів!',
			'unique'=>'Користувач з такою електронною адресою уже зареєстрований на сайті!',
        ],
        'name_u' => [
            'required' => 'Поле обов\'язкове для заповнення!',
            'min' => 'Поле повинно містити мінімум 3 символи!',
            'regex' => 'Поле повинно містити алфавітні символи!',
            'max' => 'Поле повинно містити максимум 30 символів!',
        ],
        'telephone' => [
         	'regex' => 'Поле повинно бути формату +38 (ххх) ххх-хх-хх',
			
        ],
        'phone'=>[
            'numeric' => 'Допустимі лише цифри',
            "min" => "Не меньше ніж 3 символи!",
            "max" => "Не більше ніж 13 символів!",
        ],
        'position' => [
            'required' => 'Поле обов\'язкове для заповнення!',
            'min' => 'Поле повинно містити мінімум 3 символів!',
        ],
        'salary' => [
            'required' => 'Поле обов\'язкове для заповнення',
            'min' => 'Введіть коректне ціле число!',
			"max" => "Поле не може мати значення більше :max.",
            'numeric' => 'Поле повинно містити числове значення',
            'regex' => 'Введіть коректну суму!',
			'min_salary' => 'Мінімальна зарплата має бути меншою за максимальну',
        ],
		'salary_max' => [
			'required' => 'Поле обов\'язкове для заповнення',
			'min' => 'Введіть коректне ціле число!',
			"max" => "Поле не може мати значення більше :max.",
			'numeric' => 'Поле повинно містити числове значення',
			'regex' => 'Введіть коректну суму!',
		],
        'description' => [
            'required' => 'Поле обов\'язкове для заповнення!',
            'min' => 'Поле повинно містити мінімум 130 символів!',
        ],
        'city' => [
            'required' => 'Поле обов\'язкове для заповнення!',
        ],
        'loadResume' => [
            'mimes' => 'Необхiдний формат файлу: jpeg, jpg, png, bmp!',
            'max' => 'Розмiр не повинен перевищувати 2 мб.!',
        ],
		'Link'=>[
			"url" => "Введіть коректне посилання!",
		],
        'link'=>[
            "min" => "Не меньше ніж 12 символів!",
            "max" => "Не більше ніж 225 символів!",
        ],
		'password'=>[
	       "required" => 'Поле "Пароль" обов\'язкове для заповнення!',
			'confirmed'=>'Паролі не співпадають!',
			'min'=>'Поле повинно містити мінімум 6 символів!',
        ],
		'Load'=> [
			'Load' => 'Завантажте коректний формат файлу(doc,docx,odt,rtf,txt,pdf)',
			"required" => 'Ви не можете відправити пустий файл!',
		],
		'name' => [
			'required' => 'Поле "Ім\'я" обов\'язкове для заповнення!',
			'max'=>'Поле повинно містити максимум 150 символів!',
			'regex'=>'Поле може містити лише літери,знак підкреслювання та дефіс!',
		],
        'company_name'=>[
            "min" => "Не меньше ніж 2 символи!",
            "max" => "Не більше ніж 225 символів!",
        ],
        'short_name'=>[
            "min" => "Не меньше ніж 2 символи!",
            "max" => "Не більше ніж 225 символів!",
        ],
        'company_email'=>[
            "min" => "Не меньше ніж 6 символи!",
            "max" => "Не більше ніж 100 символів!",
        ],
        
        'image'=>[
            'image'=>'Необхiдний формат файлу: jpeg, jpg, png, bmp!',
            'max'=>'Максимальний розмір файлу не повинен перевищувати 10 Мбайт'
        ],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
