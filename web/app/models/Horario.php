<?php

class Horario extends Eloquent{
 
 
public $timestamps = false; 
 
public function profesional(){    
   return $this->belongsTo('Profesional'); 
}
        
}
