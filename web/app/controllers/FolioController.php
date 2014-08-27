<?php

class FolioController extends BaseController {

    public function busqueda() {

        $folio = Input::all();
        

       

       

          return View::make('resultadoFolio',$folio);
       
       
    }

}
