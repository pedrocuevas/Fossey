<?php

class Propietario extends Eloquent{
    
 public $timestamps = false; 
 
 public function mascotas(){
     
    return $this->hasMany('Mascota'); 
 }
    

}


