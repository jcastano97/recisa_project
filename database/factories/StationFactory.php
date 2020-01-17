<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'identification' => $name,
        'name' => $name,
        'location' => $faker->address,
        'latitude' => rand(0,100),
        'longitude' => rand(0,100),
    ];
});
