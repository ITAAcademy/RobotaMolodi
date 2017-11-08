<?php

$factory->define(App\Models\Resume::class, function (Faker\Generator $faker) {

    $user = factory(App\Models\User::class)->create();
    $currency = factory(App\Models\Currency::class)->create();
    $industry = factory(App\Models\Industry::class)->create();
    $city = App\Models\City::find($faker->numberBetween(1,26));

    return [
        'id_u' => $user->id,
        'name_u' => $user->name,
        'telephone' => $faker->phoneNumber,
        'email' => $user->email,
        'position' => $faker->jobTitle,
        'industry' => $industry->id,
        'city' => $city->id,
        'salary' => $faker->numberBetween(50,500),
        'description' => $faker->paragraph,
        'salary_max' => $faker->numberBetween(501,5000),
        'currency_id' => $currency->id,
        'resumeAllUkraine' => 0
    ];
});
