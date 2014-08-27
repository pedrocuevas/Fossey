<?php

class Mascota extends Eloquent{
    
 public $timestamps = false; 
 
public function dueño(){    
   return $this->belongs_to(); 
}
        
}


