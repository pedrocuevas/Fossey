<?php

class PropietarioController extends BaseController {

    public function busqueda() {

        $rut = Input::get('rut');
        $rutsindigito = substr($rut, 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);

        $propietario = Propietario::where('rut', '=', $rut)->first();
        
        
        
        
        if(empty($propietario)){
          return Redirect::route('buscarPropietario')->with('message','no_propietario');  
        }
          else{
            Session::put('emailpropietario', $propietario->email);
            Session::put('nombrespropietario', $propietario->nombres);
            Session::put('apellidospropietario', $propietario->apellidos);
            $mascotas = Propietario::find($propietario->id)->mascotas;  
            return View::make('busqueda.propietario.resultadoPropietario',array('mascotas' => $mascotas,
                              'nombrePropietario' => $propietario->nombres,
                              'apellidoPropietario' => $propietario->apellidos));
          }
       }
       
       public function borrar(){
           
           $propietario = Propietario::find(Session::get('id'));
           $propietario->delete();
           return Redirect::to('buscarPropietarioMantenedor')->with('message','ok_delete');
       }
       
    }

