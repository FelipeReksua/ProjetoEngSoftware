<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pessoa;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'city' => $faker->city,
        'state' => $faker->state,
        'job_title' => $faker->jobTitle,
        'employee' => Str::random(10),
        'childrens' => mt_rand(0, 9),  
        'cpf' => '111.111.111-11',
        'social_project' => 0,
        'renda' => '1000.00',
        'pontos' => mt_rand(5, 2000),
        'contemplado' => 0
    ];
});
