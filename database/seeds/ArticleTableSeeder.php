<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       // $a5= new Article;
       // $a5->user_id =1 ;
       // $a5->title ='football is the best';
       // $a5->content ='The debate rages between every football fan on over who is
       //  currently the best footballer in the world. Everyone has their own opinion,
       //  some say Lionel Messi is the best player in the world right now ';
        ///$a5->save();

        //$a4= new Article;
      //  $a4->user_id =2;
       /// $a4->title ='covid 19';
        //$a4->content ='easy way to protect your self by keep social distance';
       // $a4->save();

        factory(App\Article::class, 5)->create();
    }
}
