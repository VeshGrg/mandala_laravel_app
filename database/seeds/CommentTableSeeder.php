<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        
        Article::all()->each(function ($article) {
            $article->comments()->saveMany(factory(Comment::class, 3)->make());
        });
    }
}
