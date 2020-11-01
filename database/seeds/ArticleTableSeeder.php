<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Category;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::all()->each(function ($category) {

            $articles = factory(Article::class, 10)->create();

            $category->articles()->attach($articles);
        });
    }
}
