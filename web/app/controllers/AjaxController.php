<?php

class AjaxController extends BaseController {

    public function buscar() {
       
      $data = Input::all();   
      $buscar = $data['b'];
       
      if(!empty($buscar))  {
           
        $resultado = Medicamento::where('nombre_generico', 'ILIKE', $buscar.'%')
                                  ->where('tipo','=', Session::get('iddosis'))
                                  ->orwhere('nombre_generico', 'ILIKE', $buscar.'%')
                                  ->where('tipo','=',3)->get();
        
        foreach($resultado as $result){
         echo "<div id='result' onClick='cambiaValor(this)' >".$result->nombre_generico."</div>" ;
        }
      }
       
 
    }
     
}    

