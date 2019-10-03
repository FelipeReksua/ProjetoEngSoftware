<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contato;
use Faker\Generator as Faker;

$factory->define(Contato::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'city' => $faker->city,
        'country' => $faker->country,
        'job_title' => $faker->jobTitle

    ];
});
