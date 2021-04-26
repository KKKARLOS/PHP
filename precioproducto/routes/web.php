<?php
use Illuminate\Http\Request;
use App\Web;
use App\Role;
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

//
Route::get('/', function () {
    return view('public.index');
});


Route::get('ads/listar/{category_id?}', 'AdController@listar');
//Route::post('ads/listar', 'AdController@listar');

Route::get('contacto',  function () {
    return view('public.contacto');});

Auth::routes();

//grupos de rutas que requieren que estés logueado

Route::group(['middleware' => 'auth'], function () {

	//Rutas zona privada:

	//CATEGORIAS

	Route::get('categorias','CategoryController@listar')->name('categorias.listar')->middleware('role:superadmin');
	Route::get('categorias/{id?}','CategoryController@buscar')->name('categorias.buscar')->middleware('role:superadmin');
	Route::post('categorias','CategoryController@insertar')->name('categorias.insertar')->middleware('role:superadmin');
	Route::post('categoria/foto', 'CategoryController@upLoadFoto')->name('categorias.upLoadFoto');	
	Route::delete('categorias/{id?}','CategoryController@eliminar')->name('categorias.eliminar')->middleware('role:superadmin');
	Route::put('categorias/{id?}', 'CategoryController@modificar')->name('categorias.modificar')->middleware('role:superadmin');

	//WEBS

	Route::get('webs','WebController@index')->name('webs.index')->middleware('role:superadmin');
	Route::get('websListar','WebController@listar')->name('webs.listar')->middleware('role:superadmin');
	Route::get('webs/{id?}','WebController@buscar')->name('webs.buscar')->middleware('role:superadmin');
	Route::post('webs','WebController@insertar')->name('webs.insertar')->middleware('role:superadmin');
	Route::delete('webs/{id?}','WebController@eliminar')->name('webs.eliminar')->middleware('role:superadmin');
	Route::put('webs/{id?}','WebController@modificar')->name('webs.modificar')->middleware('role:superadmin');

	//Estadisticas

	Route::get('/home', 'HomeController@index')->name('home')->middleware("role:admin,superadmin");
	//ANUNCIOS

	Route::get('anuncios/listar/{category_id?}', 'AdController@listar')->name('anuncios.listar');
	Route::get('anuncios','AdController@index')->name('anuncios.index');
	Route::get('anuncios/{id?}','AdController@buscar')->name('
		anuncios.buscar');	
	Route::get('anunciosEstadisticas','AdController@estadisticas')->name('anuncios.estadisticas');	
	Route::post('anuncios/listar', 'AdController@listar')->name('anuncios.listar');		
	Route::post('anuncios','AdController@insertar')->name('
		anuncios.insertar');		
	Route::delete('anuncios/{id?}','AdController@eliminar')->name('anuncios.eliminar');
	Route::put('anuncios/{id?}','AdController@modificar')->name('anuncios.modificar');

});

//visor de log
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//Mapas
Route::get('gmaps', 'GmapsController@gmaps');


//Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index']);
//Route::group(['middleware' => ['role:superadmin|admin']], function () {


/*	Route::resource('ads', 'AdController');


//--CARGAR LA VISTA --//
Route::get('webs', function () {
    $webs = Web::all();
    return view("webs")->with("webs",$webs);  
});
//--CREAR UNA WEB--//
Route::post('webs', function (Request $request) {
    $web = Web::create($request->all());
    return Response::json($web);
});
//--LEER UNA WEB PARA EDITAR--//
Route::get('webs/{id?}', function ($id) {
    $web = Web::find($id);
    return Response::json($web);
});
//--ACTUALIZAR UNA WEB --//
Route::put('webs/{id?}', function (Request $request, $id) {
    $web = Web::find($id);
    $web->nombre = $request->nombre;
    $web->url = $request->url;

    $web->save();
    return Response::json($web);
});
//--BORRAR UNA WEB--//
Route::delete('webs/{id?}', function ($id) {
    $web = Web::destroy($id);
    return Response::json($web);
});
*/