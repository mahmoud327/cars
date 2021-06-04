<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /*** Run the database seeds.** @return void*/
    public function run()
    {
        $permissions = [

            'cities',
            'create_city',
            'update_city',
            'delete_city',


            'governorates',
            'create_governorate',
            'update_governorate',
            'delete_governorate',

            'categories',
            'create_category',
            'update_category',
            'delete_category',

            'contacts',


            'users',
            'create_user',
            'update_user',
            'delete_user',
            'activate_user',


            'works',
            'create_work',
            'update_work',
            'delete_work',
            'activate_work',


            'offers',
            'create_offer',
            'update_offer',
            'delete_offer',
            'activate_offer',


            'roles',
            'create_role',
            'update_role',
            'delete_role',




        ];
            foreach ($permissions as $permission)
            {
                Permission::create(['guard_name' => 'admin', 'name' => $permission]);
            }
    }
}
