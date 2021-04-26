<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        //Route::get('apiPhones', 'PhoneController@apiPhones');
    });
});
Route::get('apiPhones', 'PhoneController@apiPhones');
Route::delete('apiPhones/{id?}','PhoneController@apieliminar');
Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});