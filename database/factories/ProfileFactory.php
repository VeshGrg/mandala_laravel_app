<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,9),
        'name'=> $faker->name,
        'bio'=> $faker->paragraph,
        'Birthday'=>$faker->Date(),
        'email'=> $faker->email(),
        'Gender'=> $faker->text(),
    ];
});
