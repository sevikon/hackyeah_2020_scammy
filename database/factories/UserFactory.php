<?php

/* @var $factory Factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'email' => $faker->companyEmail,
        'avatar' => 'https://randomuser.me/api/portraits/women/' . random_int(1, 60) . '.jpg',
        'password' => 'secret',
    ];
});
