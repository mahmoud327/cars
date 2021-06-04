<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name'      => 'admin',
            'email'     => 'admin@office.com',
            'roles_name' => 'super-admin',
            'activate'  => 1,
            'password'  => bcrypt('123456')
        ]);

        $role = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}
