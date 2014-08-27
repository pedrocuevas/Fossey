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
	return View::make('login');
});

Route::get('/registro', array('before' => 'auth','as' => 'registro', function()
{
    return View::make('registro');
}));

Route::get('/buscarPropietario', array('before' => 'auth','as' => 'buscarPropietario', function()
{
    return View::make('buscarPropietario');
}));

Route::get('/buscarFolio', array('before' => 'auth','as' => 'buscarFolio', function()
{
    return View::make('buscarFolio');
}));

Route::get('/logout', array('as' => 'logout', function()
{
    Auth::logout();
    return Redirect::to('/');
}));

Route::post('/ingreso', array('uses' => 'IngresoController@crearRegistro'));

Route::post('/login', array('uses' => 'LoginController@validaLogin'));

Route::post('resultadoFolio', array('uses' => 'FolioController@busqueda'));

