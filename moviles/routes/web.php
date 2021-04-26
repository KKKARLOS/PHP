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
//Clase necesaria para utilizar la autenticación de usuarios Laravel
Auth::routes();

//pantalla inicio zona publica

Route::get('/', 'PhoneController@index');

//pantalla productos-tienda zona publica

Route::get('listadoProductos', 'PhoneController@listarPublic');

Route::get('contacto',  function () {
    return view('public.contacto');});

//pantalla inicio zona privada
Route::get('/home', 'PhoneController@listarPrivate');

//Obtener datos de un teléfono
Route::get('phones/{id?}','PhoneController@buscar')->name('
		phones.buscar');

//Insertar un teléfono
Route::post('phones','PhoneController@insertar')->name('
	phones.insertar');

//Borrar un teléfono	
Route::delete('phones/{id?}','PhoneController@eliminar')->name('phones.eliminar');

//Modificar un teléfono
Route::put('phones/{id?}','PhoneController@modificar')->name('phones.modificar');

//Opiniones de un teléfono

Route::get('opinions/listar/{phone_id?}', 'PhoneController@opinions')->name('opinions.listar');

//opiniones

//pantalla inicio zona privada
Route::get('/opinions', 'OpinionController@index');

//Obtener datos de una opinión
Route::get('opinions/{id?}','OpinionController@buscar')->name('
		opiniones.buscar');

//Insertar una opinión
Route::post('opinions','OpinionController@insertar')->name('opiniones.insertar');

//Borrar una opinión	
Route::delete('opinions/{id?}','OpinionController@eliminar')->name('opiniones.eliminar');

//Modificar una opinión
Route::put('opinions/{id?}','OpinionController@modificar')->name('opiniones.modificar');

//Rangos

//pantalla inicio zona privada
Route::get('/ranges', 'RangeController@index');

//Obtener datos de una opinión
Route::get('ranges/{id?}','RangeController@buscar')->name('ranges.buscar');

//Insertar una opinión
Route::post('ranges','RangeController@insertar')->name('opiniones.insertar');

//Borrar una opinión	
Route::delete('ranges/{id?}','RangeController@eliminar')->name('ranges.eliminar');

//Modificar una opinión
Route::put('ranges/{id?}','RangeController@modificar')->name('ranges.modificar');
/*
Route::get('detalleProducto/{numero?}', 'Controller@detalleProducto');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
