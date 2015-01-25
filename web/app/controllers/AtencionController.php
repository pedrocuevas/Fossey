<?php

class AtencionController extends BaseController {

    public function crearRegistro($id) {

        $data = Input::all(); 

        $reglas = array(
                'peso' => 'numeric|digits_between:1,3|required',
                'fecha_control' => 'after:'.date("d-m-Y")
        );
        
        $fechaconformato = explode("-", $data['fecha']);
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
            return Redirect::to('ficha/verFicha'.$id)->withErrors($validador);
        }
        else{
        $atencion = New Atencion();
        $atencion->fecha = $fechaconformato[2]."-".$fechaconformato[1]."-".$fechaconformato[0];    
        $atencion->descripcion = $data['descripcion'];
        $atencion->peso = $data['peso'];
        $atencion->profesional_id = '1';
        $atencion->mascota_id = $id;
        $atencion->save();
        }
       if(isset($data['notificar']))
       {    
            if($data['notificar'] == 1)
            {
                 $fechasinformato = explode("-",$data['fecha_control']);
                 $fechafinal = $fechasinformato[2]."-".$fechasinformato[1]."-".$fechasinformato[0];
                    Mail::send('emails.template', array('mascota' => Session::get('nombremascota'), 'fecha' => $fechafinal), function($message)
                  {
                      $message->to(Session::get('emailpropietario'), Session::get('nombrespropietario').' '.Session::get('apellidospropietario'))->subject("Fecha Próximo Control de".' '.Session::get('nombremascota'));
                  });  
            }
       }


       
        return Redirect::route('buscarPropietario')->with('message','registro_ok');
    }

}
