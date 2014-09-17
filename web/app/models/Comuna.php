<?php

class Comuna extends Eloquent{
    
 public $timestamps = false; 
 
public function provincia(){    
   return $this->belongsTo('Provincia'); 
}
        
}

