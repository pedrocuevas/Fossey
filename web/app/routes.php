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
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = array();
    return View::make('registro', compact('selected','combobox'));
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

Route::post('resultadoRut', array('uses' => 'PropietarioController@busqueda'));

Route::get('verFicha{id}', array('as' => 'verFicha', function($id)
{

 $mascota = Mascota::find($id);
 
 $data = array(  'id'     => $id,
                 'nombre' => $mascota->nombre,
                 'especie' => $mascota->raza->especie->nombre,
                 'raza'    => $mascota->raza->nombre,
                 'fechanac' => $mascota->fecha_nacimiento
               );
 
 return View::make('ficha', $data);    
}));


Route::get('razas', 'cargaRazasController@razas');

Route::post('/registroAtencion{id}', array('uses' => 'AtencionController@crearRegistro'));