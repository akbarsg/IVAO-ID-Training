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
	Route::get('/dashboard', 'TrainingController@dashboard');
	Route::get('/training/delete/{id}', 'TrainingController@deleteRequest');

    Route::get('/sendmail', 'TesMailController@send2');
});

Route::group(['middleware' => 'staff'], function () {
    Route::get('/room', 'HomeController@index')->name('home');
    Route::post('/room/assignme', 'TrainingController@assignMe');
    Route::post('/room/request/delete/{id}', 'TrainingController@deleteRequest');
    Route::post('/room/training/complete', 'TrainingController@complete');
    Route::get('/room/training/cancel/{id}', 'TrainingController@unassignMe');
    Route::get('/room/training/all', 'TrainingController@showAll');
    Route::get('/room/training/mine', 'TrainingController@showMine');
    Route::get('/room/training/pending', 'TrainingController@showPending');
    Route::get('/room/users', 'UserController@showAll');
    Route::get('/room/profile/{id}', 'UserController@show');
    // Route::get('/room/profile/{id}', 'HomeController@index');

    Route::get('/room/notification/markread/all', 'NotificationController@readAll');
    Route::get('/room/notification/markread/{id}', 'NotificationController@read');
});