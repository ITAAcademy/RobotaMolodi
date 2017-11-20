<?php

$factory->define(App\Models\Resume::class, function (Faker\Generator $faker) {

    return [
        'name_u' => $faker->name,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->email,
        'position' => $faker->jobTitle,
        'salary' => $faker->numberBetween(50,500),
        'description' => $faker->paragraph,
        'salary_max' => $faker->numberBetween(501,5000),
        'resumeAllUkraine' => 0
    ];
});
