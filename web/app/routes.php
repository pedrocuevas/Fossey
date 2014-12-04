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
    
	return View::make('login.login');
});

Route::get('/home', array('before' => 'auth', 'as' => 'home', function()
{
    $count = Mascota::all()->count();
    Session::put('totalmascotas',$count);
	return View::make('home.home');
}));

Route::get('/registro/registro', array('before' => 'auth','as' => 'registro', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = array();
    

    
    return View::make('registro.registro', compact('selected','combobox'));
}));

Route::get('/busqueda/propietario/buscarPropietario', array('before' => 'auth','as' => 'buscarPropietario', function()
{
    return View::make('busqueda.propietario.buscarPropietario');
}));

Route::get('/busqueda/folio/buscarFolio', array('before' => 'auth','as' => 'buscarFolio', function()
{
    return View::make('busqueda.folio.buscarFolio');
}));

Route::get('/logout', array('as' => 'logout', function()
{
    Auth::logout();
    return Redirect::to('/');
}));

Route::post('/ingreso', array('uses' => 'IngresoController@crearRegistro'));

Route::post('/login', array('uses' => 'LoginController@validaLogin'));

Route::post('busqueda/folio/buscarFolio/resultadoFolio', array('uses' => 'FolioController@busqueda'));

Route::post('busqueda/propietario/buscarPropietario/resultadoRut', array('uses' => 'PropietarioController@busqueda'));

Route::get('ficha/verFicha{id}', array('as' => 'verFicha', function($id)
{

 $mascota = Mascota::find($id);
 
 $atenciones = $mascota->atenciones()->paginate(3);
 
Session::put('nombremascota', $mascota->nombre);

    $profesionales = Profesional::all()->lists('nombres','id');
    $combobox2 = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected2 = array();
    
 $data = array(  'id'     => $id,
                 'especie' => $mascota->raza->especie->nombre,
                 'raza'    => $mascota->raza->nombre,
                 'fechanac' => $mascota->fecha_nacimiento,
                 'atenciones' => $atenciones,
                 'combobox2' => $combobox2,
                 'selected2' => $selected2
               );
 

 
 return View::make('ficha.ficha', $data);    
}));


Route::get('razas', 'cargaRazasController@razas');

Route::post('ficha/registroAtencion{id}', array('uses' => 'AtencionController@crearRegistro'));

Route::get('ficha/verAtencion{id}', array('as' => 'verAtencion', function($id)
{

 $atencion = Atencion::find($id);
 
 $data = array(  
                 'descripcion'     => $atencion->descripcion,
                 'fecha_atencion'  => $atencion->fecha,
                 'peso'            => $atencion->peso,
                 'descripcion'     => $atencion->descripcion
          
               );
 
 return View::make('ficha.detalles', $data);    
}));


Route::get('/mantenedor/propietario/buscarPropietarioMantenedor', array('before' => 'auth','as' => 'buscarPropietarioMantenedor', function()
{
    return View::make('mantenedor.propietario.buscarPropietarioMantenedor');
}));

Route::post('mantenedor/propietario/resultadoPropietarioMantenedor', array('before' => 'auth','as' => 'resultadoPropietarioMantenedor','uses' => 'PropietarioMantenedorController@busqueda'));

Route::get('/mantenedor/propietario/editarPropietario', array('before' => 'auth','as' => 'editarPropietario', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = Session::get('comuna_id');;
    
    return View::make('mantenedor.propietario.editarPropietario',compact('selected','combobox'));
}));

Route::post('/editarPropietarioGuardar', array('uses' => 'EditarPropietarioController@editarRegistro'));

Route::get('borrarPropietario', 'PropietarioController@borrar');

Route::get('/mantenedor/profesional/agregarProfesional', array('before' => 'auth','as' => 'agregarProfesional', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = array();
    
  
    return View::make('mantenedor.profesional.agregarProfesional', compact('selected','combobox'));
}));

Route::post('agregarProfesional', 'ProfesionalMantenedorController@agregar');

Route::get('/mantenedor/profesional/buscarProfesionalMantenedor', array('before' => 'auth','as' => 'buscarProfesionalMantenedor', function()
{
    return View::make('mantenedor.profesional.buscarProfesionalMantenedor');
}));

Route::post('mantenedor/propietario/resultadoProfesionalMantenedor', array('before' => 'auth','as' => 'resultadoProfesionalMantenedor','uses' => 'ProfesionalMantenedorController@busqueda'));

Route::get('/mantenedor/propietario/editarProfesional', array('before' => 'auth','as' => 'editarProfesional', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = Session::get('comuna_id');;
    
    return View::make('mantenedor.profesional.editarProfesional',compact('selected','combobox'));
}));

Route::get('/medicamentos/agregarMedicamento', array('before' => 'auth','as' => 'agregarMedicamento', function()
{
    return View::make('medicamentos.agregarMedicamento');
    
}));

Route::post('medicamento/guardarMedicamento', array('before' => 'auth','as' => 'guardarMedicamento','uses' => 'MedicamentoController@agregarMedicamento'));

Route::get('/medicamentos/calcularDosis{id}', array('before' => 'auth','as' => 'calcularDosis', function($id)
{
Session::put('iddosis',$id);
    
return View::make('medicamentos.calcularDosis');
}));

Route::post('medicamento/Dosis', array('before' => 'auth','as' => 'calculoDosis','uses' => 'MedicamentoController@calcularDosis'));

Route::post('/ajax', array( 'as' => 'ajax', 'uses' => 'AjaxController@buscar'));


Route::get('/agenda/agregarHorarioPeluqueria', array('before' => 'auth','as' => 'agregarHorarioPeluqueria', function()
{
    $profesionales = Profesional::where('tipo_id','=','2')->lists('nombres','id');
    $combobox = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected = array();
 
    return View::make('agenda.agregarHorarioPeluqueria',compact('selected','combobox'));   
}));

Route::get('/agenda/agregarHorarioVeterinaria', array('before' => 'auth','as' => 'agregarHorarioVeterinaria', function()
{
    $profesionales = Profesional::where('tipo_id','=','1')->lists('nombres','id');
    $combobox = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected = array();
 
    return View::make('agenda.agregarHorarioVeterinaria',compact('selected','combobox'));   
}));
Route::post('agenda/agregarHorarioPeluqueria/agregar', array('before' => 'auth','as' => 'agregaHorario','uses' => 'HorarioController@agregarHorario'));


Route::get('tomarHora', function()
{
    
	return View::make('agenda.tomarHora');
});

Route::post('verHorario', array('as' => 'verHorario','uses' => 'TomarHoraController@verHorario'));

Route::get('selectTipo', 'selectProfesionalController@profesional');

Route::get('reserva={hh}={mm}={ss}', array('as' => 'reserva', function($hh,$mm,$ss)
{

$datos = array('hora' => $hh, 'minutos' => $mm, 'segundos' => $ss);    
    
return View::make('agenda.reservaHora', $datos);
	
}));

Route::post('reservarHora', array('as' => 'reservarHora','uses' => 'TomarHoraController@reservar'));

Route::get('/mantenedor/raza/agregarRaza', array('before' => 'auth','as' => 'agregarRaza', function()
{
            return View::make('mantenedor.raza.agregarRaza');
}));

Route::get('/mantenedor/raza/buscarRaza', array('before' => 'auth','as' => 'buscarRaza', function()
{
            return View::make('mantenedor.raza.buscarRaza');
}));

Route::post('/mantenedor/raza/guardarRaza', array('as' => 'guardarRaza','uses' => 'RazaMantenedorController@agregar'));

Route::post('/mantenedor/raza/buscarRaza', array('as' => 'resultadoRaza','uses' => 'RazaMantenedorController@buscar'));

Route::get('mantenedor/raza/borrarRaza', array('as' => 'borrarRaza','uses' => 'RazaMantenedorController@borrar'));

Route::get('/mantenedor/raza/editarRaza', array('before' => 'auth','as' => 'editarRaza', function()
{
            return View::make('mantenedor.raza.editarRaza');
}));

Route::post('/mantenedor/raza/guardarEditorRaza', array('as' => 'guardarEditorRaza','uses' => 'RazaMantenedorController@editar'));