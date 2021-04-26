<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Category::create(['nombre'=>'Moda',
                        'foto'=>'moda.jpg',
                        ]);
        Category::create(['nombre'=>'Juguetes',
                        'foto'=>'juguetes.jpg',
                        ]);
        Category::create(['nombre'=>'Electrónica',
                        'foto'=>'electronica.jpg',
                        ]);
        Category::create(['nombre'=>'Inmobiliaria',
                        'foto'=>'inmobiliaria.gif',
                        ]);
        Category::create(['nombre'=>'Perfumes',
                        'foto'=>'perfumes.jpg',
                        ]);
        Category::create(['nombre'=>'Libros',
                        'foto'=>'libros.jpg',
                        ]); 
        Category::create(['nombre'=>'Calzado',
                        'foto'=>'calzado.jpg',
                        ]);  
        Category::create(['nombre'=>'Deporte',
                        'foto'=>'deporte.jpg',
                        ]);                                                       
        //LLamar al factory e indicar el número de veces a ejecutar
        factory(App\Category::class, 20)->create();         
    }
}

