<?php

$factory->define(App\Models\Currency::class, function (Faker\Generator $faker) {
    return [
        'currency' => $faker->currencyCode,
        'index' => $faker->randomFloat(2,1,40)
    ];
});
