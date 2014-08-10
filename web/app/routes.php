<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{
	return View::make('layout');
});

Route::get('/registro', array('as' => 'registro', function()
{
    return View::make('registro');
}));


Route::post('/ingreso', array('uses' => 'IngresoController@crearRegistro'));
