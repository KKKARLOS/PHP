<?php

use Illuminate\Database\Seeder;
use App\Phone;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create(  
                        [
                        'modelo'=>'Samsung Galaxy note 4',
                        'urlfoto'=>'https://images-na.ssl-images-amazon.com/images/I/A1fEs3xq8NL._SL1500_.jpg',
                        'valoracion'=>8,
                        'range_id'=>4
                        ]
                    );
        Phone::create(  
                        [
                        'modelo'=>'Samsung Galaxy S-5 2015',
                        'urlfoto'=>'https://www.movilzona.es/app/uploads/2018/10/Samsung-Galaxy-S5-grande.png',
                        'valoracion'=>10,
                        'range_id'=>2
                        ]
                    );
        Phone::create(  
                        [
                        'modelo'=>'Nokia Lumia 1320',
                        'urlfoto'=>'https://images-na.ssl-images-amazon.com/images/I/61ASikC8mEL._SL1000_.jpg',
                        'valoracion'=>7,
                        'range_id'=>3
                        ]
                    );
        Phone::create(  
                        [
                        'modelo'=>'Xiaomi My Play',
                        'urlfoto'=>'https://www.xiaomi-shop.es/media/catalog/product/cache/1/thumbnail/600x/17f82f742ffe127f42dca9de82fb58b1/x/i/xiaomi-mi-play-negro.png',
                        'valoracion'=>8,
                        'range_id'=>3
                        ]
                    );                        
        Phone::create(  
                        [
                        'modelo'=>'LG Leon 2015',
                        'urlfoto'=>'https://images-na.ssl-images-amazon.com/images/I/71YNYI3YZEL._SL1500_.jpg',
                        'valoracion'=>8,
                        'range_id'=>4
                        ]
                    );  


        Phone::create(  
                        [
                        'modelo'=>'IPhone 6',
                        'urlfoto'=>'https://images-na.ssl-images-amazon.com/images/I/41slW0c5zEL._SL500_AA300_.jpg',
                        'valoracion'=>9,
                        'range_id'=>5
                        ]
                    );
      
        Phone::create(  
                        [
                        'modelo'=>'IPhone 6',
                        'urlfoto'=>'https://images-na.ssl-images-amazon.com/images/I/41slW0c5zEL._SL500_AA300_.jpg',
                        'valoracion'=>9,
                        'range_id'=>5
                        ]
                    );
        Phone::create(  
                        [
                        'modelo'=>'Xiaomi mi 9',
                        'urlfoto'=>'https://www.xiaomi-shop.es/media/catalog/product/cache/1/thumbnail/600x/17f82f742ffe127f42dca9de82fb58b1/x/i/xiaomi-mi-9-lila-128.png',
                        'valoracion'=>9,
                        'range_id'=>5
                        ]
                    );        

        //LLamar al factory e indicar el número de veces a ejecutar
        //factory(App\Phone::class, 20)->create();         
    }
}