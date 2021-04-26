<?php

use Illuminate\Database\Seeder;
use App\Web;

class WebsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Web::create(['nombre'=>'Zalando','url'=>'https://www.zalando.es']);
        Web::create(['nombre'=>'Fotocasa','url'=>'http://www.fotocasa.com']);
        Web::create(['nombre'=>'Jugettos','url'=>'www.jugettos.com']);
        Web::create(['nombre'=>'Decathlon','url'=>'https://www.decathlon.es/es/']);

        //LLamar al factory e indicar el número de veces a ejecutar
        factory(App\Web::class, 20)->create();         
    }
}

