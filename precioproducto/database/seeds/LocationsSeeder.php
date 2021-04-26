<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(['ciudad'=>'San Sebastian',
                        'pais'=>'España',
                        'latitud'=>'43.314714',
                        'longitud'=>'-1.9724963000000002',
                        ]);
        Location::create(['ciudad'=>'Madrid',
                        'pais'=>'España',
                        'latitud'=>'40.4232824',
                        'longitud'=>'-3.7107257',
                        ]);  
        Location::create(['ciudad'=>'Barcelona',
                        'pais'=>'España',
                        'latitud'=>'41.38792',
                        'longitud'=>'2.169919',
                        ]); 
        Location::create(['ciudad'=>'Sevilla',
                        'pais'=>'España',
                        'latitud'=>'37.38264',
                        'longitud'=>'-5.996295',
                        ]);                                                                              
        //LLamar al factory e indicar el número de veces a ejecutar
        //factory(App\Location::class, 5)->create();         
    }
}