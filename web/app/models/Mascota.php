<?php

class Mascota extends Eloquent{
    
 
public function propietario(){    
   return $this->belongsTo('Propietario'); 
}

public function raza(){    
   return $this->belongsTo('Raza'); 
}

 public function atenciones(){
     
    return $this->hasMany('Atencion'); 
 }
 
     public static function ultimosRegistros(){
        return DB::table('mascotas')
                        ->join('razas', 'raza_id', '=', 'razas.id')
                        ->join('especies','especie_id','=', 'especies.id')
                        ->orderBy('mascotas.created_at', 'desc')
                        ->select('mascotas.id', 'mascotas.nombre as nombremascota'
                                , 'razas.nombre as raza','especies.nombre',
                                'mascotas.created_at')
                        ->take(5)->get();        
    }  
        
}


