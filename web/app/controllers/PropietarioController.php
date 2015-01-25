<?php

class PropietarioController extends BaseController {

    public function busqueda() {

        $rut = Input::all();         
        $reglas = array('rut' =>  'required');
                
        $validador = Validator::make($rut, $reglas);
        
        if($validador->fails()){
             return Redirect::route('buscarPropietario')->withErrors($validador); 
        }  
        
        $rutsindigito = substr($rut['rut'], 0, -2); 
        $rutfinal = str_replace(".", "", $rutsindigito);

        $propietario = Propietario::where('rut', '=', $rutfinal)->first();
        
        

        
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
           return Redirect::route('buscarPropietarioMantenedor')->with('message','ok_delete');
       }
       
    }

