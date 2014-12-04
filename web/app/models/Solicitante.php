<?php

class Solicitante extends Eloquent{
 
 
public $timestamps = false; 
 
public function agenda(){    
   return $this->hasMany('Agenda'); 
}
        
}

