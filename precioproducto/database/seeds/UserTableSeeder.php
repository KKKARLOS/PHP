<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_superadmin = Role::where('name', 'superadmin')->first();
        
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('secret');
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('secret');
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach($role_admin);
     }
}
