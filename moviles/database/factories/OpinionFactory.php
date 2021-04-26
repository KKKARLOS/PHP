<?php
use App\Opinion;
use App\Phone;
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

$factory->define(Opinion::class, function (Faker $faker) {
    return [
            'phone_id'=>Phone::all()->random()->id,
        	'nombre' => $faker->unique()->company,
        	'url' => $faker->unique()->url,
    		'cantidad'=> $faker->numberBetween(1,499)   	
    ];
});