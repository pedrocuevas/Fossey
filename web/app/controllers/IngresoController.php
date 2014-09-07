<?php

class IngresoController extends BaseController {

    public function crearRegistro() {

        $data = Input::all(); 
        $rutsindigito = substr($data['rut'], 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);
      
        $buscaPropietario = Propietario::where('rut','=',$rut)->pluck('id');
        
        
        
        if( empty($buscaPropietario) )
        { 
        $propietario = New Propietario();
        $propietario->rut = $rut;    
        $propietario->nombres = $data['nombres'];
        $propietario->apellidos = $data['apellidos'];
        
      
        
        $propietario->fecha_nacimiento = $data['fecha_nac'];
        $propietario->genero = $data['genero'];
        $propietario->direccion = $data['direccion'];
        $propietario->comuna_fk = '1';
        $propietario->email = $data['correo'];
        $propietario->telefono = $data['fono'];
        $propietario->save();
        $idpropietario = $propietario->id ;
        }
        else
        {
          $idpropietario = $buscaPropietario;
        }
        
        
        $mascota = New Mascota();
        $mascota->nombre = $data['nombre_mascota'];
        $mascota->fecha_nacimiento = $data['fecha_nac_mascota'];
        $mascota->propietario_id = $idpropietario;
        $mascota->genero = $data['sexo'];
        $mascota->raza_id = '5';
        $mascota->save();
        


        echo "<script>alert('Registro Exitoso!'); window.location='login'; </script>";
        
    }

}
