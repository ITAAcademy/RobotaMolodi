<?php

$factory->define(App\Models\Industry::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainWord
    ];
});
