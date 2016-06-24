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

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('activate/{param}', 'ActivationController@getParam');

Route::get('error', function(){
	echo "requested URL couldnot be found";
});


Route::get('auth/google', 'Auth\Authenticate@redirectToProvider');
Route::get('auth/google/callback', 'Auth\Authenticate@handleProviderCallback');
