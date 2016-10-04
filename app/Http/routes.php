<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/login", "AuthenticateController@authenticate");
Route::group(['middleware' => 'apiauth'],function(){
	Route::get("/ouvrir", "VoletController@ouvrir");
	Route::get("/fermer", "VoletController@fermer");
	Route::get("/stop", "VoletController@stop");
	Route::get("/test", "VoletController@test");
});

// Route::auth();
