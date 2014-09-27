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



        echo "<script>alert('Registro Exitoso!'); window.location='/'; </script>";
        
    }

}
