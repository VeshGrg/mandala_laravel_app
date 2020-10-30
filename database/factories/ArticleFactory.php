<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,9),
        'title'=> $faker->sentence,
        'content'=> $faker->paragraph,

    ];
});
