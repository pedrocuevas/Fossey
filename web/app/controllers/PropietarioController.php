<?php

class PropietarioController extends BaseController {

    public function busqueda() {

        $rut = Input::get('rut');
        $rutsindigito = substr($rut, 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);

        $propietario = Propietario::where('rut', '=', $rut)->first();
        
        
        
        
        if(empty($propietario)){
          echo "<script>alert('No se encontraron mascotas coincidentes con el rut ingresado'); window.location='buscarPropietario'; </script>";
        }
          else{   
            $mascotas = Propietario::find($propietario->id)->mascotas;  
            return View::make('resultadoPropietario',array('mascotas' => $mascotas,
                              'nombrePropietario' => $propietario->nombres,
                              'apellidoPropietario' => $propietario->apellidos));
          }
       }
       
    }

