<?php

use Illuminate\Database\Seeder;

use App\User;

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
        factory(App\User::class, 10)
            ->create()
            ->each(function ($user) {
                $user->assignRole('student');
                $user->givePermissionTo('change profile details');
                $user->givePermissionTo('create comments');
            });


        // Create new admin user
        factory(User::class)
            ->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ])
            ->assignRole('admin');
    }
}
