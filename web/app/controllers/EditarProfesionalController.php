<?php

class EditarProfesionalController extends BaseController {

    public function editarRegistro() {

        $data = Input::all(); 
        $profesional = Profesional::find(Session::get('id_pro'));
        
        $reglas = array('nombres'           => 'alpha_spaces|required|min:4|max:80',  
                        'direccion'         => 'required',
                        'correo'            => 'email' ,
                         'fono'              => array('regex:/^[9|2]-[5-9]([0-9]{6,7})$/')
                 );    
        $validador = Validator::make($data, $reglas);
         
        if($validador->fails()){
           return Redirect::route('editarProfesional')->withErrors($validador);
        }
        else{

                $profesional->nombres = $data['nombres'];  
                $profesional->direccion = $data['direccion'];
                $profesional->comuna_id = $data['comunas'];
                $profesional->email = $data['correo'];
                $profesional->telefono = $data['fono'];
                $profesional->save();

                return Redirect::route('buscarProfesionalMantenedor')->with('message','ok_update');
        }
    }

}