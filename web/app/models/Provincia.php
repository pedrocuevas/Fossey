<?php

class Provincia extends Eloquent{
    
 public $timestamps = false; 
 
public function comunas(){    
   return $this->hasMany('Comuna'); 
}
        
public function region(){    
   return $this->belongsTo('Region','region_id'); 
}
}

