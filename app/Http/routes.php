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
Route::get('/', 'ImagesController@index');
// Route::get('/home', 'HomeController@index');
Route::get('/image', 'ImagesController@index');
Route::get('/add', 'ImagesController@create');
Route::post('/store', 'ImagesController@store');
Route::get('/read/{id}', 'ImagesController@show');
Route::get('/edit/{id}', 'ImagesController@edit');
Route::post('/update/{id}', 'ImagesController@update');
Route::get('/delete/{id}', 'ImagesController@destroy');
Route::get('query', 'SearchController@search');
Route::resource('users', 'UsersController', array('except' => array('index', 'destroy')));