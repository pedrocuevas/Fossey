<?php

class Agenda extends Eloquent{
 
 
public $timestamps = false; 
 
public function solicitante(){    
   return $this->belongsTo('Solicitante'); 
}
        
}
