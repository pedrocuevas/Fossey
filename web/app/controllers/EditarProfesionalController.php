<?php

class EditarProfesionalController extends BaseController {

    public function editarRegistro() {

        $data = Input::all(); 
        $profesional = Profesional::find(Session::get('id'));
        
        $reglas = array('nombres'           => 'alpha_spaces|required|min:4|max:80',  
                        'direccion'         => 'required',
                        'correo'            => 'email' ,
                        'fono'              => 'digits:8'
                 );    
        $validador = Validator::make($data, $reglas);
         
        if($validador->fails()){
           return Redirect::route('editarProfesional')->withErrors($validador);
        }
        else{

                $profesional->nombres = $data['nombres'];  
                $profesional->direccion = $data['direccion'];
                $profesonal->comuna_id = $data['comunas'];;
                $profesional->email = $data['correo'];
                $profesional->telefono = $data['fono'];
                $profesional->save();

                return Redirect::to('buscarProfesionalMantenedor')->with('message','ok_update');
        }
    }

}