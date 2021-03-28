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
*/

Route::get('/', function(){
	return response()->json([
		'status_code' => 200,
		'message' => 'Api is up and running'
	]);
}); 
Route::group(['prefix' => 'auth'], function(){

	Route::post('/login','API\AuthController@login'); 

	Route::post('/register','API\AuthController@register');

	Route::group(['middleware' => 'auth:api'], function() {

       Route::get('logout', 'API\AuthController@logout');
       
  	});

});
Route::group(['middleware' => 'auth:api'], function() {

    Route::get('books', 'API\BookController@index');

	Route::get('book/{id}', 'API\BookController@show');

	Route::post('book', 'API\BookController@store');

	Route::put('book', 'API\BookController@store');

	Route::delete('book/{id}', 'API\BookController@destroy');

});

