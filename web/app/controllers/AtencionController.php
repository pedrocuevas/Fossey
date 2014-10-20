<?php

class AtencionController extends BaseController {

    public function crearRegistro($id) {

        $data = Input::all(); 
       

        $atencion = New Atencion();
        $atencion->fecha = $data['fecha'];    
        $atencion->descripcion = $data['descripcion'];
        $atencion->peso = $data['peso'];
        $atencion->profesional_id = '1';
        $atencion->mascota_id = $id;
        $atencion->save();
       
       if(isset($data['notificar']))
       {    
            if($data['notificar'] == 1)
            {
                    Mail::send('emails.template', array('mascota' => Session::get('nombremascota'), 'fecha' => $data['fecha_control']), function($message)
                  {
                      $message->to(Session::get('emailpropietario'), Session::get('nombrespropietario').' '.Session::get('apellidospropietario'))->subject("Fecha Próximo Control de".' '.Session::get('nombremascota'));
                  });  
            }
       }


        echo "<script>alert('Registro Exitoso!'); window.location='/Fossey/web/public/buscarPropietario' </script>";
        
    }

}
