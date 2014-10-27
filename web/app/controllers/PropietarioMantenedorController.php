<?php

class PropietarioMantenedorController extends BaseController {

    public function busqueda() {

        $rut = Input::get('rut');
        $rutsindigito = substr($rut, 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);

        $propietario = Propietario::where('rut', '=', $rut)->first();
        
        
        
        
        if(empty($propietario)){
          echo "<script>alert('No se encontró propietario'); window.location='buscarPropietarioMantenedor'; </script>";
        }
          else{
              
             Session::put('id', $propietario->id);
             Session::put('nombres', $propietario->nombres);
             Session::put('apellidos', $propietario->apellidos);
             Session::put('comuna_id', $propietario->comuna_id);
             Session::put('direccion', $propietario->direccion);
             Session::put('rut', $propietario->rut); 
             Session::put('genero', $propietario->genero);
             Session::put('correo', $propietario->email);
             Session::put('fono', $propietario->telefono); 
     
            return View::make('mantenedorPropietario',array(
                              'nombres' => $propietario->nombres,
                              'apellidos' => $propietario->apellidos,
                              'rut' => $propietario->rut,
                              'id'=> $propietario->id));
          }
       }
       
    }

