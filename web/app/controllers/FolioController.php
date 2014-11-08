<?php

class FolioController extends BaseController {

    public function busqueda() {

        $folio = Input::get('folio');

        $mascota = Mascota::find($folio);
       
   
       
       if(empty($mascota)){
         echo  "<script>alert('No se encontraron mascotas coincidentes con el folio ingresado'); window.location='buscarFolio'; </script>";
       }
       else{


          return Redirect::to('ficha/verFicha'.$folio);
       }
       
    }

}
