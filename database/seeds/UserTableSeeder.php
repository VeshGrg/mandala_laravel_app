<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        // Create Students
        factory(App\Models\User::class, 10)
            ->create()
            ->each
            ->assignRole('student');


        // Create new admin user
        factory(User::class)
            ->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ])
            ->assignRole('admin');
    }
}
