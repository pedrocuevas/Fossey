<?php

class IngresoController extends BaseController {

    public function crearRegistro() {

        $data = Input::all(); 
        $rutsindigito = substr($data['rut'], 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);
      
        $buscaPropietario = Propietario::where('rut','=',$rut)->pluck('id');
        
        $reglas = array('nombres'           => 'alpha_spaces|required|min:4|max:80', 
                        'apellidos'         => 'alpha_spaces|required|min:4|max:80', 
                        'direccion'         => 'required',
                        'correo'            => 'email|unique:propietarios,email' ,
                        'fono'              => array('regex:/^[9|2]-[5-9]([0-9]{6,7})$/'),
                        'genero'            => 'boolean',
                        'nombre_mascota'    => 'alpha_spaces|required|min:4|max:40',
                        'fecha_nac_mascota' => 'before:'.date("d-m-Y")
            );      
        
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
           return Redirect::route('registro')->withErrors($validador);
        }
        else if($data['comunas'] == 0){
           return Redirect::route('registro')->with('message','no_comuna')->withInput(); 
        }
        else if($data['especie'] == 0){
           return Redirect::route('registro')->with('message','no_especie')->withInput(); 
        }
        else if(($data['razas'] == 0) || ($data['razas'] == '')){
           return Redirect::route('registro')->with('message','no_raza')->withInput(); 
        }
        else{
            
        
            if( empty($buscaPropietario) )
            { 
            $propietario = New Propietario();
            $propietario->rut = $rut;    
            $propietario->nombres = $data['nombres'];
            $propietario->apellidos = $data['apellidos'];      
            $propietario->genero = $data['genero'];
            $propietario->direccion = $data['direccion'];
            $propietario->comuna_id = $data['comunas'];;
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
            $mascota->raza_id = $data['razas'];
            $mascota->comentario = $data['comentario'];
            $mascota->save();



            return Redirect::route('home')->with('message','registro_ok'); 

    }
    
  }

}
