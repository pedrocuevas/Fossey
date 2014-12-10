<?php

class FolioController extends BaseController {

    public function busqueda() {

       $data = Input::all();       
       $reglas = array('folio' => 'required|numeric');      
        
       $validador = Validator::make($data, $reglas);
       
       if($validador->fails()){
          return Redirect::route('buscarFolio')->withErrors($validador);
       }
       else{
            $mascota = Mascota::find($data['folio']);
            if(empty($mascota)){
              return Redirect::route('buscarFolio')->with('message','folio_inexistente');  
            }
            else{
               return Redirect::to('ficha/verFicha'.$folio);
            }
       }
       
    }

}
