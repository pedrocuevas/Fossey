<?php

class Tipo extends Eloquent{
    
    protected $table = 'tipos';
    public $timestamps = false; 
 
public function profesional(){    
   return $this->hasMany('Profesional'); 
}
        
}

