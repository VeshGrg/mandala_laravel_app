<?php

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        $roles = collect([
            ['name' => 'admin'],
            ['name' => 'student']
        ]);

        $permissions = collect([
            ['name' => 'view dashboard'],
            ['name' => 'change profile details'],
            ['name' => 'create articles'],
            ['name' => 'edit articles'],
            ['name' => 'delete articles'],
            ['name' => 'create categories'],
            ['name' => 'edit categories'],
            ['name' => 'delete categories'],
            ['name' => 'create comments']
        ]);

        $roles = $roles->map(function ($role) {
            return Role::create($role);
        });

        $permissions = $permissions->map(function ($permission) {
            return Permission::create($permission);
        });
    }
}
