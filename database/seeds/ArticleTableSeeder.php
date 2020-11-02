<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        Category::all()->each(function ($category) {

            $articles = factory(Article::class, 10)->create();

            $category->articles()->attach($articles);
        });
    }
}
