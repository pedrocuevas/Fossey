<?php
 class IngresoController extends BaseController
 {

public function crear()
 {
    
$data = Input::all();
var_dump($data);

$propietario = New Propietario();
$propietario->nombres = $data['nombres'];
$propietario->apellidos = $data['apellidos'];
$propietario->rut = $data['rut'];
$propietario->fecha_nacimiento = $data['fecha_nac'];
$propietario->genero = '1';
$propietario->direccion = 'provi';
$propietario->comuna_fk = '1';
$propietario->email = 'pedro@utem.cl';
$propietario->telefono = '97573967';
$propietario->save();

    
 echo "Ingreso exitoso";
 }



}