<?php

use Illuminate\Database\Seeder;
use App\Opinion;

class OpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'modelo'=>'Samsung Galaxy note 4'
        //https://www.xataka.com/analisis/samsung-galaxy-note-4-analisis (ver css)
        Opinion::create(  
                        [
                        'nombre'=>'Computerhoy.com',
                        'cantidad'=>172,
                        'url'=>'https://www.xataka.com/analisis/samsung-galaxy-note-4-analisis#comments',
                        'phone_id'=>1
                        ]
                    );

        //LLamar al factory e indicar el número de veces a ejecutar
        factory(App\Opinion::class, 50)->create();         
    }
}