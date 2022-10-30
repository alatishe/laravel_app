<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rate;
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
        'option_name' => $faker->sentence,
        'upper_weight' => $faker->sentence,
        'lower_weight' => $faker->sentence,
        'upper_height' => $faker->sentence,
        'lower_height' => $faker->sentence,
        'upper_width' => $faker->sentence,
        'lower_width' => $faker->sentence,
        'price' => $faker->sentence,
    ];
});
