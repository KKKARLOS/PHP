<?php

use App\Ad;
use App\Category;
use App\User;
use App\Web;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Ad::class, function (Faker $faker) {
    return [
            'category_id'=>Category::all()->random()->id,
            'web_id'=>Web::all()->random()->id,
            'user_id'=>User::all()->random()->id,   	
        	'title' => $faker->unique()->company,
        	'url' => $faker->unique()->url,
        	'foto' => $faker->imageUrl($width = 50, $height = 50),
    		'precio_vta'=> $faker->numberBetween(1,499),
    		'precio_chollo'=> $faker->numberBetween(500,5000),
    		'precio_alto'=> $faker->numberBetween(5001,9000)     	
    ];
});