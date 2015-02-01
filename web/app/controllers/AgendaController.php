<?php

class AgendaController extends BaseController {

    public function agendaPeluqueria() {
      
     $fecha = date("Y-m-d");   
     
     $agenda = Agenda::where('fecha' ,'=', $fecha)->get();
     
     $data = array('agendas' => $agenda);
     
     return View::make('agenda.agendaPeluqueria',$data);
 
    }
    
        public function agendaVeterinaria() {
      
     $fecha = date("Y-m-d");   
     $agenda = Agenda::where('fecha' ,'=', $fecha)->get();
    
     
     $data = array('agendas' => $agenda);
     
     return View::make('agenda.agendaVeterinaria',$data);
 
    }
     
}    
