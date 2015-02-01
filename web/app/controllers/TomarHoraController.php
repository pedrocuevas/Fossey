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
            $horainicio = explode(',',$horarioProfesional->hora_inicio);
            $horafin = explode(',',$horarioProfesional->hora_fin);
            
            $horaini_l = $horainicio[0];
            $horaini_ma = $horainicio[1];
            $horaini_mi = $horainicio[2];
            $horaini_j = $horainicio[3];
            $horaini_v = $horainicio[4];
            $horaini_s = $horainicio[5];
            $horaini_d = $horainicio[6];
            
            $horafin_l = $horafin[0];
            $horafin_ma = $horafin[1];
            $horafin_mi = $horafin[2];
            $horafin_j = $horafin[3];
            $horafin_v = $horafin[4];
            $horafin_s = $horafin[5];
            $horafin_d = $horafin[6];
            
  
        if($dias[date("N",strtotime($data['fecha']))-1] == 1)
        {        
            
          switch( date("N",strtotime($data['fecha'])) )
            {
            case 1:
                  $horainicio = $horaini_l;
                  $horafin    = $horafin_l;
                  break;
            case 2:
                  $horainicio = $horaini_ma;
                  $horafin    = $horafin_ma;
                  break;
            case 3:
                  $horainicio = $horaini_mi;
                  $horafin    = $horafin_mi;
                  break;
            case 4:
                  $horainicio = $horaini_j;
                  $horafin    = $horafin_j;
                  break;
            case 5:
                  $horainicio = $horaini_v;
                  $horafin    = $horafin_v;
                  break;
            case 6:
                  $horainicio = $horaini_s;
                  $horafin    = $horafin_s;
                  break;
            case 7:
                  $horainicio = $horaini_d;
                  $horafin    = $horafin_d;
                  break;            
            } 
            
            $horainicio2 = explode(":", $horainicio);
            $hora = $horainicio2[0];
            $min = $horainicio2[1];
            $seg = $horainicio2[2];

            $inicio = date($horainicio);
            $fin = $horafin;
            $fin_sep = explode(":",$fin);

            
         
            
            for($i = 0 ; $i < ($fin-$inicio); $i++)
            {
               $horario = Agenda::where('hora', '=', $hora.':'.$min.':'.$seg)->
                          where('fecha','=',date("Y-m-d",strtotime($data['fecha'])))->where('id_profesional','=',$data['profesional'])->first();
               
               
             if($data['tipo'] == 2)
             {    
               $hora++;
               $min += 30;
               
               if($min == 60){
                  $hora++;
                  $min = 0;
               }
             }
             else{
                  $hora++;
              }
                 
               

               
               if(empty($horario))
               {
                 $array[] = 1;  
               }
               else
               {
                   $array[] = 0;
               }
               
               if($hora > $fin_sep[0]){break;}

                
            }
            
                        }
            else{
                return Redirect::to('tomarHora')->with('message','no_dia');
            }
                                    }
            else{
                return Redirect::to('tomarHora')->with('message','no_horario');
            }
            
    
           
           
           Session::put('fechareserva',$data['fecha']);
           Session::put('idprofe', $data['profesional']);
           
            $profesional = Profesional::find($data['profesional']);
            $fechaformat = explode("-",$data['fecha']);
            
            if ($profesional->tipo_id == 2) {
                Session::put('servicio',"Peluquería");
            } else {
                Session::put("servicio","Consulta Veterinaria");
            }
            
            Session::put("nombreprofe",$profesional->nombres);

            $datos = array('inicio'      => $inicio ,
                            'fin'        => $fin,
                            'horainicio' => $horainicio[0],
                            'horafin'    => $horafin[0],
                            'fecha'      => $fechaformat[2]."/".$fechaformat[1]."/".$fechaformat[0],
                            'nombre'     => Session::get('nombreprofe'),
                            'servicio'   => Session::get('servicio'),
                            'tipo'       => $data['tipo'],
                            'array'      => $array);
            
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
            
           
            
            $fecha = explode('-',$data['fecha']);
            $dia = $fecha[2];
            $mes = $fecha[1];
            $agno = $fecha[0];        
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
      
      Session::put("email_soli",$data['correo']);
      Session::put("nombres_soli",$data['nombres']);
      
      try 
      {        

      
      $existe_hora = Agenda::where('hora', '=', $data['hora'])->
                         where('fecha','=',Session::get('fechareserva'))->first();
      
     if(empty($existe_hora))
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
            $agenda->id_profesional = Session::get("idprofe");
            $agenda->save();
            
          Mail::send('emails.template2', array('horas' => $data['hora'], 'fecha' => Session::get('fechareserva'), 'servicio' => Session::get('servicio'), 'nombre' => Session::get('nombreprofe')), function($message)
          {
              $message->to(Session::get('email_soli'), Session::get('nombres_soli'))->subject("Reserva de Hora Fossey");
          });
           
            

               
            return Redirect::to('tomarHora')->with('message','reserva_exitosa'); 
            }
      else{
          return Redirect::to('tomarHora')->with('message','hora_existe'); 
      }
      
      }
      catch (Exception $ex) 
      {
          return Redirect::to('tomarHora')->with('message',$ex); 
      }
     }

}
