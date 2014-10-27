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
 
 $atenciones = $mascota->atenciones()->paginate(3);
 
Session::put('nombremascota', $mascota->nombre);

 
 $data = array(  'id'     => $id,
                 'especie' => $mascota->raza->especie->nombre,
                 'raza'    => $mascota->raza->nombre,
                 'fechanac' => $mascota->fecha_nacimiento,
                 'atenciones' => $atenciones
               );
 
 return View::make('ficha', $data);    
}));


Route::get('razas', 'cargaRazasController@razas');

Route::post('/registroAtencion{id}', array('uses' => 'AtencionController@crearRegistro'));

Route::get('verAtencion{id}', array('as' => 'verAtencion', function($id)
{

 $atencion = Atencion::find($id);
 
 $data = array(  
                 'descripcion'     => $atencion->descripcion,
                 'fecha_atencion'  => $atencion->fecha,
                 'peso'            => $atencion->peso,
                 'descripcion'     => $atencion->descripcion
          
               );
 
 return View::make('detalles', $data);    
}));


Route::get('/buscarPropietarioMantenedor', array('before' => 'auth','as' => 'buscarPropietarioMantenedor', function()
{
    return View::make('buscarPropietarioMantenedor');
}));

Route::post('resultadoPropietarioMantenedor', array('uses' => 'PropietarioMantenedorController@busqueda'));

Route::get('/editarPropietario', array('before' => 'auth','as' => 'editarPropietario', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = Session::get('comuna_id');;
    
    return View::make('editarPropietario',compact('selected','combobox'));
}));

Route::post('/editarPropietarioGuardar', array('uses' => 'EditarPropietarioController@editarRegistro'));

Route::get('borrarPropietario', 'PropietarioController@borrar');