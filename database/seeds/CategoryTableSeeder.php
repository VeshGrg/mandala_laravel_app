<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Category::class, 5)->create();
    }
}
