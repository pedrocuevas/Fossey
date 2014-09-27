<?php

class Profesional extends Eloquent{
    
 public $timestamps = false; 
 
public function comuna(){    
   return $this->belongsTo('Comuna'); 
}
        
}


