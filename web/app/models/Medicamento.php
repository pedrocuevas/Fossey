<?php

class Medicamento extends Eloquent{
    
 public $timestamps = false; 
 
 public function especie(){    
   return $this->belongsTo('Especie'); 
}
        
}

?>