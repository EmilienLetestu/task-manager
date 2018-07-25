<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A regular user';
        $role_user->save();

        $role_manager = new Role();
        $role_manager->name = 'Manager';
        $role_manager->description = 'create and assign task';
        $role_manager->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'administrator';
        $role_admin->save();

    }
}
