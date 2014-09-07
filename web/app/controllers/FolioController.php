<?php

class FolioController extends BaseController {

    public function busqueda() {

        $folio = Input::get('folio');

        $mascota = Mascota::find($folio);
       
   
       
       if(empty($mascota)){
         echo  "<script>alert('No se encontraron mascotas coincidentes con el folio ingresado'); window.location='buscarFolio'; </script>";
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
