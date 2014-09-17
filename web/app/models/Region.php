<?php

class Region extends Eloquent{
    
 protected $table = 'regiones';   
 public $timestamps = false; 
 
public function provincias(){    
   return $this->hasMany('Provincia'); 
}
        
}

