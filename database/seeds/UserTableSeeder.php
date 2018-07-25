<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user    = Role::where('name', 'User')->first();
        $role_manager = Role::where('name', 'Manager')->first();
        $role_admin   = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Toto';
        $user->email ='user@gmail.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);

        $manager = new User();
        $manager->name = 'Bobo';
        $manager->email ='manager@gmail.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $admin = new User();
        $admin->name = 'Jojo';
        $admin->email ='admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}

