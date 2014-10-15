<?php

class Mascota extends Eloquent{
    
 public $timestamps = false; 
 
public function propietario(){    
   return $this->belongsTo('Propietario'); 
}

public function raza(){    
   return $this->belongsTo('Raza'); 
}

 public function atenciones(){
     
    return $this->hasMany('Atencion'); 
 }
        
}


