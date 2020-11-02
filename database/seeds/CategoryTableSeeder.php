<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::truncate();
        
        factory(Category::class, 5)->create();
    }
}
