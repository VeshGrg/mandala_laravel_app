<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    $genders = ['male', 'female'];

    return [
        'bio'      => $faker->paragraph,
        'birthday' => $faker->Date(),
        'gender'   => $genders[array_rand($genders)],
    ];
});
