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

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => "Поле не може мати значення більше :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	],
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	],
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

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
            'min' => 'Поле повинно містити мінімум 3 символів!',
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
