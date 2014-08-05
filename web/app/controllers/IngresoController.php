<?php

class IngresoController extends BaseController {

    public function crear() {

        $data = Input::all();
        

        $propietario = New Propietario();
        $propietario->nombres = $data['nombres'];
        $propietario->apellidos = $data['apellidos'];
        $propietario->rut = $data['rut'];
        $propietario->fecha_nacimiento = $data['fecha_nac'];
        $propietario->genero = '1';
        $propietario->direccion = $data['direccion'];
        $propietario->comuna_fk = '1';
        $propietario->email = $data['correo'];
        $propietario->telefono = $data['fono'];
        $propietario->save();
        
        $mascota = New Mascota();
        $mascota->nombre = $data['nombre_mascota'];
        $mascota->fecha_nacimiento = $data['fecha_nac_mascota'];
        $mascota->propietario_fk = $propietario->id;
        $mascota->genero = $data['optionsRadiosInline'];
        $mascota->raza_fk = '5';
        $mascota->save();
        


        echo "Ingreso exitoso";
    }

}
