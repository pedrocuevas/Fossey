<?php

class EditarPropietarioController extends BaseController {

    public function editarRegistro() {

        $data = Input::all(); 
        $propietario = Propietario::find(Session::get('id'));
        
        $reglas = array('nombres'           => 'alpha_spaces|required|min:4|max:80', 
                        'apellidos'         => 'alpha_spaces|required|min:4|max:80', 
                        'direccion'         => 'required',
                        'correo'            => 'email' ,
                        'fono'              => 'digits:8'
                 );    
        $validador = Validator::make($data, $reglas);
         
        if($validador->fails()){
           return Redirect::route('editarPropietario')->withErrors($validador);
        }
        else{

                $propietario->nombres = $data['nombres'];
                $propietario->apellidos = $data['apellidos'];      
                $propietario->direccion = $data['direccion'];
                $propietario->comuna_id = $data['comunas'];;
                $propietario->email = $data['correo'];
                $propietario->telefono = $data['fono'];
                $propietario->save();

                return Redirect::to('buscarPropietarioMantenedor')->with('message','ok_update');
        }
    }

}