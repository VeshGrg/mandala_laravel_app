<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\User;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();

        User::all()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make());
        });
    }
}
