<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $images = [
        'article-images/article1.jpg',
        'article-images/article2.jpg',
        'article-images/article3.jpg',
        'article-images/article4.jpg',
        'article-images/article5.jpg',
        'article-images/article6.jpg',
        'article-images/article7.jpg',
        'article-images/article8.jpg',
        'article-images/article9.jpg',
        'article-images/article10.jpg',
        null,
    ];

    return [
        'user_id' => $faker->numberBetween(1, 9),
        'title'   => $faker->sentence,
        'content' => $faker->paragraph,
        'featured_image' =>  $images[array_rand($images)]
    ];
});
