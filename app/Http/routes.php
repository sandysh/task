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

// Route::get('/user', function () {
//     return auth()->user();
// });

Route::auth();

Route::get('/', 'HomeController@index');
Route::any('/home', 'HomeController@index');

Route::get('activate/{param}', 'ActivationController@getParam');

Route::get('userData', 'UserController@index');

Route::group(['prefix' => 'api','middleware' => 'api'], function () {
	
	Route::any('/logout', 'UserController@logout');
	
	Route::get('task/{pid}', ['as' => 'tasks', 'uses' =>'TaskController@index'])->where('pid', '[0-9]+');
	
	Route::get('yesterday-task/{pid}/', 'TaskController@yesterdayTask')->where('pid', '[0-9]+');

	Route::any('task/create/{id}','TaskController@store')->where('id', '[0-9]+');

	Route::any('task/delete/{id}','TaskController@destroy')->where('id', '[0-9]+');

	Route::post('task/complete/{id}','TaskController@taskComplete')->where('id', '[0-9]+');

	Route::any('task/uncheck/{id}','TaskController@uncheckTask')->where('id', '[0-9]+');

	Route::any('task/start/{id}','TaskController@start')->where('id', '[0-9]+');

	Route::any('task/pause/{id}','TaskController@pause')->where('id', '[0-9]+');

	Route::any('task/resume/{id}','TaskController@resume')->where('id', '[0-9]+');

	Route::any('task/stop/{id}','TaskController@stop')->where('id', '[0-9]+');

});

Route::get('auth/google', 'Auth\Authenticate@redirectToProvider');
Route::get('auth/google/callback', 'Auth\Authenticate@handleProviderCallback');
