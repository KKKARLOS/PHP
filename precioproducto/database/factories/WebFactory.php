<?php

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

$factory->define(Web::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name,
        'url' => $faker->unique()->url
    ];
});