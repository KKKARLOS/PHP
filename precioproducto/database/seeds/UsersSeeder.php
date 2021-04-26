<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Primero meto mi usuario fijo
        $user = User::create([
        	'name'=>'Karlos Perdiguero Otxoa',
        	'email'=>'jc.perdiguerocarlos@gmail.com',
       		'email_verified_at' => now(),
        	'password' => Hash::make('11111111'), // password
        	'remember_token' => Str::random(10),
        ]); 
        //Asigno rol superadmin
        $role_user = Role::where('name', 'superadmin')->first();
        $user->roles()->attach($role_user);
        //Asigno rol admin
        $role_user = Role::where('name', 'admin')->first();
        $user->roles()->attach($role_user);

        //Primero meto mi usuario fijo
        $user = User::create([
            'name'=>'Asier Perdiguero Urretabizkaia',
            'email'=>'asier.perdiguerourreta@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('22222222'), // password
            'remember_token' => Str::random(10),
        ]); 
        $role_user = Role::where('name', 'admin')->first();
        $user->roles()->attach($role_user);

        $role_user = Role::where('name', 'user')->first();
        //LLamar al factory e indicar el número de veces a ejecutar
        $users = factory(App\User::class, 20)->create();  
        foreach ($users as $user)   
        {
            $user->roles()->attach($role_user);
        }
    }
}
