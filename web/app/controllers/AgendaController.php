<?php

class AgendaController extends BaseController {

    public function agendaPeluqueria() {
        $fecha = date("Y-m-d");   
        $semana = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));
        $semana = date("Y-m-d",$semana);
        $agenda = Agenda::whereBetween('fecha', array($fecha, $semana))->get();
        $data = array('agendas' => $agenda);

        return View::make('agenda.agendaPeluqueria',$data);

    }
    
    public function agendaVeterinaria() {     
        $fecha = date("Y-m-d");
        $semana = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));
        $semana = date("Y-m-d",$semana);
        $agenda = Agenda::whereBetween('fecha', array($fecha, $semana))->get();
        $data = array('agendas' => $agenda);

        return View::make('agenda.agendaVeterinaria',$data);
    }
     
}    
