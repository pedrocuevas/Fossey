<?php

class Atencion extends Eloquent{
    
    protected $table = 'atenciones';
    public $timestamps = false; 
 
public function profesional(){    
   return $this->belongsTo('Profesional'); 
}

public function mascota(){    
   return $this->belongsTo('Mascota'); 
}
  
        
}

