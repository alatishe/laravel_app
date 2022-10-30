<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Carrier;
use Faker\Generator as Faker;

$factory->define(Carrier::class, function (Faker $faker) {
    return [
        'partner_name' => $faker->sentence,
        'partner_email' => $faker->safeEmail,
        'carrier_name' => $faker->sentence,
    ];
});
