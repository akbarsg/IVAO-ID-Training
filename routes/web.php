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
    return view('awal');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function () {
	// Route::get('/home', 'TrainingController@requestForm');
	Route::get('/training', 'TrainingController@requestForm');
	Route::post('/training', 'TrainingController@storeRequest');
	Route::get('/training/delete/{id}', 'TrainingController@deleteRequest');
});

Route::group(['middleware' => 'staff'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/room/assignme', 'TrainingController@assignMe');
});