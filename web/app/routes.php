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


//--------------LOGIN-----------------------------------------------------
Route::get('/', function()
{
    
	return View::make('login.login');
});

Route::get('/logout', array('as' => 'logout', function()
{
    Auth::logout();
    return Redirect::to('/');
}));



Route::post('/login', array('uses' => 'LoginController@validaLogin'));

//---------------FIN DE LOGIN-----------------------------------------------




//----------------HOME---------------------------------------------------

Route::get('/home', array('before' => 'auth', 'as' => 'home', function()
{
    $mascotas = Mascota::all()->count();
    Session::put('totalmascotas',$mascotas);
    
    $medicamentos = Medicamento::all()->count();
    Session::put('totalmedicamentos',$medicamentos);
    
	return View::make('home.home');
}));

//-------------FIN DE HOME--------------------------------------------------




//-------------MÓDULO DE REGISTRO DE PACIENTES-----------------------------------

Route::get('/registro/registro', array('before' => 'auth','as' => 'registro', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = array();
    

    
    return View::make('registro.registro', compact('selected','combobox'));
}));

Route::post('/ingreso', array('uses' => 'IngresoController@crearRegistro'));
Route::post('/ingresoMascota', array('uses' => 'IngresoController@crearMascota'));
Route::get('borrarMascota{idmascota}', array('before' => 'auth', 'uses' => 'IngresoController@borrarMascota'));
Route::post('ficha/registroAtencion{id}', array('uses' => 'AtencionController@crearRegistro'));

//----------------FIN DE MÓDULO DE REGISTRO DE PACIENTES--------------------------------------




//---------------MÓDULO DE BÚSQUEDA-------------------------------------------------------------

Route::get('/busqueda/propietario/buscarPropietario', array('before' => 'auth','as' => 'buscarPropietario', function()
{
    return View::make('busqueda.propietario.buscarPropietario');
}));

Route::get('/busqueda/folio/buscarFolio', array('before' => 'auth','as' => 'buscarFolio', function()
{
    return View::make('busqueda.folio.buscarFolio');
}));

Route::post('busqueda/folio/buscarFolio/resultadoFolio', array('as' => 'resultadoFolio','uses' => 'FolioController@busqueda'));

Route::post('busqueda/propietario/buscarPropietario/resultadoRut', array('uses' => 'PropietarioController@busqueda'));

Route::get('ficha/verFicha{id}', array('as' => 'verFicha', function($id)
{

 $mascota = Mascota::find($id);
 
 $atenciones = $mascota->atenciones()->paginate(3);
 
Session::put('nombremascota', $mascota->nombre);


    $profesionales = Profesional::orderBy('nombres', 'asc')->get()->lists('nombres','id');
    $combobox2 = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected2 = array();
    $fechaformat = explode("-",$mascota->fecha_nacimiento);
    
 $data = array(  'id'     => $id,
                 'especie' => $mascota->raza->especie->nombre,
                 'raza'    => $mascota->raza->nombre,
                 'fechanac' =>  $fechaformat[2]."-".$fechaformat[1]."-".$fechaformat[0],
                 'atenciones' => $atenciones,
                 'combobox2' => $combobox2,
                 'selected2' => $selected2
               );
 

 
 return View::make('ficha.ficha', $data);    
}));


Route::get('razas', 'cargaRazasController@razas');



Route::get('ficha/verAtencion{id}', array('as' => 'verAtencion', function($id)
{

 $atencion = Atencion::find($id);
 
 $data = array(  
                 'descripcion'     => $atencion->descripcion,
                 'fecha_atencion'  => $atencion->fecha,
                 'peso'            => $atencion->peso,
                 'id'              => $atencion->id
          
               );
 
 return View::make('ficha.detalles', $data);    
}));

//--------------FIN DE MÓDULO DE BÚSQUEDA--------------------------------------------




//-------------------MÓDULO DE MANTENEDORES---------------------------------------------------

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

Route::post('/editarPropietarioGuardar', array('as' => 'editarPropietarioGuardar', 'uses' => 'EditarPropietarioController@editarRegistro'));

Route::get('borrarPropietario', array('before' => 'auth','as' => 'borrarPropietario', 'uses' => 'PropietarioController@borrar'));

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

Route::post('mantenedor/profesional/resultadoProfesionalMantenedor', array('before' => 'auth','as' => 'resultadoProfesionalMantenedor','uses' => 'ProfesionalMantenedorController@busqueda'));

Route::get('/mantenedor/profesional/editarProfesional', array('before' => 'auth','as' => 'editarProfesional', function()
{
    $comunas = Provincia::find(25)->comunas->lists('nombre','id');
    $combobox = array(0 => "Seleccione una comuna ") + $comunas;
    $selected = Session::get('comuna_id');;
    
    return View::make('mantenedor.profesional.editarProfesional',compact('selected','combobox'));
}));

Route::post('/editarProfesionalGuardar', array('as' => 'editarProfesionalGuardar', 'uses' => 'EditarProfesionalController@editarRegistro'));

Route::get('borrarProfesional', array('before' => 'auth','as' => 'borrarProfesional', 'uses' => 'ProfesionalMantenedorController@borrar'));

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

//------------------------FIN DE MANTENEDORES-----------------------------------------------------------------------



//-----------------------MÓDULO DE MEDICAMENTOS-----------------------------------------------------------------

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

//-----------------FIN DE MÓDULO DE MEDICAMENTOS-------------------------------------------------------------------



//------------------MÓDULO DE AGENDAMIENTO DE HORAS------------------------------------------------------------------------

Route::get('/agenda/agregarHorarioPeluqueria', array('before' => 'auth','as' => 'agregarHorarioPeluqueria', function()
{
    $profesionales = Profesional::where('tipo_id','=','2')->lists('nombres','id');
    $combobox = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected = array();
    Session::put('tipohorario',2);
 
    return View::make('agenda.agregarHorarioPeluqueria',compact('selected','combobox'));   
}));

Route::get('/agenda/agregarHorarioVeterinaria', array('before' => 'auth','as' => 'agregarHorarioVeterinaria', function()
{
    $profesionales = Profesional::where('tipo_id','=','1')->lists('nombres','id');
    $combobox = array(0 => "Seleccione un profesional ") + $profesionales;
    $selected = array();
     Session::put('tipohorario',1);
 
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

Route::get('agenda/agendaPeluqueria', array('as' => 'agendaPeluqueria','uses' => 'AgendaController@agendaPeluqueria'));

Route::get('agenda/agendaVeterinaria', array('as' => 'agendaVeterinaria','uses' => 'AgendaController@agendaVeterinaria'));

//-------------------------FIN DEL MÓDULO DE AGENDAMIENTO DE HORAS----------------------------------------------

//------------------MÓDULO DE REPORTES------------------------------------------------------------------------

Route::get('/ficha/reportes{id}', array('before' => 'auth','as' => 'buscarProfesionalMantenedor', function($id)
{
    $xml =  simplexml_load_file(URL::asset('js/sample1.jrxml'));


$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
//$parametro=$_GET['id'];
$PHPJasperXML->arrayParameter=array("id_atencion"=>$id);
$PHPJasperXML->xml_dismantle($xml);

$PHPJasperXML->transferDBtoArray("sebastian.cl","fossey","fossey","fosseydb");
$PHPJasperXML->outpage("I"); 
}));

//-------------------------FIN DEL MÓDULO DE REPORTES----------------------------------------------