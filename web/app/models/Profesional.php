<?php

class Profesional extends Eloquent{
 
  protected $table = 'profesionales';   
 public $timestamps = false; 
 
public function comuna(){    
   return $this->belongsTo('Comuna'); 
}
        
}

