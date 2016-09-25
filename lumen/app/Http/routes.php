<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    $output= array("version"=>$app->version());
    return response()->json($output);
});

// USER
$app->group(['prefix' => 'user','namespace' => 'App\Http\Controllers'], function () use ($app) {

    $app->get('','UserController@index');

    $app->get('{id}','UserController@show');

    $app->post('','UserController@save');

    $app->put('{id}','UserController@update');

    $app->delete('{id}','UserController@delete');
});

// ARTICLE
$app->group(['prefix' => 'article','namespace' => 'App\Http\Controllers'], function () use ($app) {

    $app->get('','ArticleController@index');

    $app->get('{id}','ArticleController@show');

    $app->post('','ArticleController@save');

    $app->put('{id}','ArticleController@update');

    $app->delete('{id}','ArticleController@delete');
});

// BOOK
$app->group(['prefix' => 'book','namespace' => 'App\Http\Controllers'], function () use ($app) {

    $app->get('','BookController@index');

    $app->get('{id}','BookController@show');

    $app->post('','BookController@save');

    $app->put('{id}','BookController@update');

    $app->delete('{id}','BookController@delete');
});

