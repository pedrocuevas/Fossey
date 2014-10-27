<?php

class EditarPropietarioController extends BaseController {

    public function editarRegistro() {

        $data = Input::all(); 
       $propietario = Propietario::find(Session::get('id'));
        
           
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