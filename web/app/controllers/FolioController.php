<?php

class FolioController extends BaseController {

    public function busqueda() {

        $folio = Input::get('folio');

        $mascota = Mascota::find($folio);
       
   
       
       if(empty($mascota)){
          return Redirect::to('buscarFolio');
       }
       else{
               $propietario = $mascota->propietario->nombres;
               $raza        = $mascota->raza->nombre;
               $especie     = $mascota->raza->especie->nombre;
            
                $data = array(
                              'folio'             => $folio,
                              'nombre'     => $mascota['nombre'],
                              'especie'           => $especie,
                              'raza'              => $raza,
                              'fechanac'          => $mascota['fecha_nacimiento'],
                    );


          return View::make('ficha',$data);
       }
       
    }

}
