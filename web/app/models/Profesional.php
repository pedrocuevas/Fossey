<?php

class Profesional extends Eloquent{
 
  protected $table = 'profesionales';   
 public $timestamps = false; 
 
public function comuna(){    
   return $this->belongsTo('Comuna'); 
}

public function horario(){    
   return $this->hasOne('Horario'); 
}

public function agendas(){    
   return $this->hasMany('Agenda'); 
}

public function tipo(){    
   return $this->belongsTo('Tipo'); 
}
        
}


