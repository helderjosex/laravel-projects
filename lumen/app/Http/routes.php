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
    return $app->version();
});

// ARTICLE
$app->get('/article','ArticleController@index');

$app->get('article/{id}','ArticleController@get');

$app->post('article','ArticleController@save');

$app->put('article/{id}','ArticleController@update');

$app->delete('article/{id}','ArticleController@delete');

// BOOK
$app->get('/book','BookController@index');

$app->get('book/{id}','BookController@get');

$app->post('book','BookController@save');

$app->put('book/{id}','BookController@update');

$app->delete('book/{id}','BookController@delete');