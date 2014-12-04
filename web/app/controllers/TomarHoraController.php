<?php

class TomarHoraController extends BaseController {

    public function verHorario() {
       $data = Input::all(); 
        try {

            if(!empty($data['fecha']) && !empty($data['profesional']) && ($data['profesional'] != 'Seleccione un profesional')){
             $horarioProfesional = Horario::where("id_profesional","=",$data['profesional'])->first();
            }
            else{
             return Redirect::to('tomarHora');    
            }
            
            
            if(isset($horarioProfesional))
            {    
            $dias = explode(',',$horarioProfesional->dias);
            $horainicio = explode(':',$horarioProfesional->hora_inicio);
            $hora = $horainicio[0];
            $min = $horainicio[1];
            $seg = $horainicio[2];
            $horafin = explode(':',$horarioProfesional->hora_fin);
            $inicio = date($horarioProfesional->hora_inicio);
            $fin = $horarioProfesional->hora_fin;
            }
            else{
                return Redirect::to('tomarHora');
            }  
            
            for($i = 0 ; $i < ($fin-$inicio); $i++)
            {
               $horario = Agenda::where('hora', '=', $hora.':'.$min.':'.$seg)->
                          where('fecha','=',$data['fecha'])->first();
               $hora++;
               if(empty($horario))
               {
                 $array[] = 1;  
               }
               else
               {
                   $array[] = 0;
               }
                
            }
            
    
           
           
           Session::put('fechareserva',$data['fecha']); 
           
            $datos = array('inicio'      => $inicio ,
                            'fin'        => $fin,
                            'horainicio' => $horainicio[0],
                            'horafin'    => $horafin[0],
                            'fecha'      => $data['fecha'], 
                            'array'     => $array);
            
            $lunes = $dias[0];
            $martes = $dias[1];
            $miercoles = $dias[2];
            $jueves = $dias[3];
            $viernes = $dias[4];
            $sabado = $dias[5];
            $domingo = $dias[6];
            
            if($lunes == 1)
            {
              $lunes = 'Mon';  
            }
            else
            {
              $lunes = '';  
            }   
            
            if($martes == 1)
            {
              $martes = 'Tue';  
            }
            else
            {
              $martes = '';  
            } 
            
            if($miercoles == 1)
            {
              $miercoles = 'Wed';  
            }
            else
            {
              $miercoles = '';  
            } 
            
            if($jueves == 1)
            {
              $jueves = 'Thu';  
            }
            else
            {
              $jueves = '';  
            } 
            
            if($viernes == 1)
            {
              $viernes = 'Fri';  
            }
            else
            {
              $viernes = '';  
            } 
            
            if($sabado == 1)
            {
              $sabado = 'Sat';  
            }
            else
            {
              $sabado = '';  
            } 
            
            if($domingo == 1)
            {
              $domingo = 'Sun';  
            }
            else
            {
              $domingo = '';  
            } 

            
            $semana = array($lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo);
            
           
            
            $fecha = explode('/',$data['fecha']);
            $dia = $fecha[0];
            $mes = $fecha[1];
            $agno = $fecha[2];        
            $nombredia = date("D",mktime(0, 0, 0, $mes, $dia, $agno));
            
            if (in_array($nombredia, $semana)) {
                return View::make('agenda.horasDisponibles', $datos);
             }
            else {
                return Redirect::to('tomarHora')->with('message','no_hora');
             }
             
      
            } 
   
         catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function reservar(){
      
        
      $data = Input::all();
      $rutsindigito = substr($data['rut'], 0, -2); 
      $rut = str_replace(".", "", $rutsindigito);
      
      try 
      {        
      $solicitante = new Solicitante();
      $solicitante->rut = $rut;
      $solicitante->nombre = $data['nombres'];
      $solicitante->email = $data['correo'];
      $solicitante->fono = $data['fono'];
      $solicitante->save();
      
        
     
      $agenda = new Agenda();
      $agenda->fecha = Session::get('fechareserva');
      $agenda->hora = $data['hora'];
      $agenda->solicitante_id = $solicitante->id;
      $agenda->save();
      
      return Redirect::to('tomarHora')->with('message','reserva_exitosa'); 
      }  
      catch (Exception $ex) 
      {
          return Redirect::to('tomarHora')->with('message',$ex); 
      }
     }

}
