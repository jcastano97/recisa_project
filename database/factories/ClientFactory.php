<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'identification_number' => $faker->unique()->randomNumber($nbDigits = 8, $strict = false),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email
    ];
});
