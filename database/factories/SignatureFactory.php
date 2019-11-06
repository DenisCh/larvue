<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Signature;
use Faker\Generator as Faker;

$factory->define(App\Signature::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->sentence
    ];
});
