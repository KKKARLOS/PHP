<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// La creación de datos de roles debe ejecutarse primero
	    $this->call(RoleTableSeeder::class);
	    // Los usuarios necesitarán los roles previamente generados
	    $this->call(UserTableSeeder::class);
	    $this->call(RangeTableSeeder::class);
	    $this->call(PhoneTableSeeder::class);
        $this->call(OpinionTableSeeder::class);   
    }
}
