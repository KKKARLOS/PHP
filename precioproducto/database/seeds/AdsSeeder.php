<?php

use Illuminate\Database\Seeder;
use App\Ad;
class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::create([
        	'category_id'=>'1',
        	'web_id'=>'1',
        	'user_id'=>'1',
        	'title'=>'SATUR NEW RAGLAN R T S\S - Camiseta estampada',
        	'url'=>'https://mosaic03.ztat.net/vgs/media/pdp-zoom/GS/12/2O/0G/WA/11/GS122O0GW-A11@9.jpg',
        	'foto'=>'https://mosaic03.ztat.net/vgs/media/pdp-zoom/PU/14/1E/09/SC/11/PU141E09S-C11@10.jpg',
        	'precio_vta'=>'29.95',
        	'precio_chollo'=>'15',
        	'precio_alto'=>'40',
        ]);
        Ad::create([
            'category_id'=>'1',
            'web_id'=>'1',
            'user_id'=>'1',
            'title'=>'PHANTOM ACADEMY IC - Botas de fútbol sin tacos',
            'url'=>'https://www.zalando.es/nike-performance-phantom-academy-ic-botas-de-futbol-sin-tacos-bright-crimsonblackmetallic-silver-n1242a1mf-g11.html',
            'foto'=>'https://mosaic03.ztat.net/vgs/media/packshot/pdp-zoom/N1/24/2A/1M/FG/11/N1242A1MF-G11@4.jpg',
            'precio_vta'=>'80',
            'precio_chollo'=>'55',
            'precio_alto'=>'110',
        ]);   

        //LLamar al factory e indicar el número de veces a ejecutar
        factory(App\Ad::class, 20)->create(); 

    }
}
