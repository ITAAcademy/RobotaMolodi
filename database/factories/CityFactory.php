<?php

$factory->define(App\Models\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city
    ];
});
