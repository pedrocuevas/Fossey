<?php

class Agenda extends Eloquent{
  
    public $timestamps = false; 

    public function solicitante(){    
       return $this->belongsTo('Solicitante'); 
    }

    public function profesional(){    
       return $this->belongsTo('Profesional','id_profesional'); 
    }
    
    public static function agendasVet($fecha){
        return DB::table('agendas')
                        ->join('profesionales', 'id_profesional', '=', 'profesionales.id')
                        ->where('fecha', $fecha)
                        ->where('tipo_id', 1)
                        ->count();        
    }
    
    public static function agendasPelu($fecha){
        return DB::table('agendas')
                        ->join('profesionales', 'id_profesional', '=', 'profesionales.id')
                        ->where('fecha', $fecha)
                        ->where('tipo_id',2)
                        ->count();        
    }    
        
}
