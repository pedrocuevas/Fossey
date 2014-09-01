<?php

class Especie extends Eloquent{
    
 public $timestamps = false; 
 
public function razas(){    
   return $this->hasMany('Raza'); 
}
        
}

