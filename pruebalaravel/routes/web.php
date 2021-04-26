<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('localiza', function () {
    return view('localiza');
});

Route::get('contacto', function () {
    return view('contacto');
});

Route::get('saludo', function () {
    return view('saludo');
});

Route::get('saludo','saludocontroller@saludo');*/
Route::get('saludo/{nombre}/{edad?}','Controller@saludar');
Route::get('localiza','Controller@localiza');
Route::get('contacto','Controller@contacto');
Route::get('productos/{numero?}', 'Controller@cargarProductos');
Route::get('juego/{numero?}','Controller@juego')->name("jugar")->where('numero','[1-3]');