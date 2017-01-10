<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function (){
    Route::post('auth/logout', 'AuthController@logout');
    Route::resource('client', 'ClientController');
});

