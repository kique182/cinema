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
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login'
]);
Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');
Route::resource('usuario','UsuarioController');
Route::resource('log','LogController');
Route::get('logout','LogController@logout');
Route::resource('genero','GeneroController');
Route::resource('pelicula','MovieController');
Route::resource('mail','MailController');
