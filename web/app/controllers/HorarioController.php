<?php

class HorarioController extends BaseController {

    public function agregarHorario() {

        try {

            $data = Input::all();
            $lunes =  (isset($data['lunes'])) ? $data['lunes'] : '0';
            $martes =  (isset($data['martes'])) ? $data['martes'] : '0';
            $miercoles =  (isset($data['miercoles'])) ? $data['miercoles'] : '0';
            $jueves =  (isset($data['jueves'])) ? $data['jueves'] : '0';
            $viernes =  (isset($data['viernes'])) ? $data['viernes'] : '0';
            $sabado =  (isset($data['sabado'])) ? $data['sabado'] : '0';
            $domingo =  (isset($data['domingo'])) ? $data['domingo'] : '0';
            
            $data['horainicio_l'] = (isset($data['horainicio_l'])) ? $data['horainicio_l'] : '0';
            $data['horainicio_ma'] = (isset($data['horainicio_ma'])) ? $data['horainicio_ma'] : '0';
            $data['horainicio_mi'] = (isset($data['horainicio_mi'])) ? $data['horainicio_mi'] : '0';
            $data['horainicio_j'] = (isset($data['horainicio_j'])) ? $data['horainicio_j'] : '0';
            $data['horainicio_v'] = (isset($data['horainicio_v'])) ? $data['horainicio_v'] : '0';
            $data['horainicio_s'] = (isset($data['horainicio_s'])) ? $data['horainicio_s'] : '0';
            $data['horainicio_d'] = (isset($data['horainicio_d'])) ? $data['horainicio_d'] : '0';
            
            $data['horafin_l'] = (isset($data['horafin_l'])) ? $data['horafin_l'] : '0';
            $data['horafin_ma'] = (isset($data['horafin_ma'])) ? $data['horafin_ma'] : '0';
            $data['horafin_mi'] = (isset($data['horafin_mi'])) ? $data['horafin_mi'] : '0';
            $data['horafin_j'] = (isset($data['horafin_j'])) ? $data['horafin_j'] : '0';
            $data['horafin_v'] = (isset($data['horafin_v'])) ? $data['horafin_v'] : '0';
            $data['horafin_s'] = (isset($data['horafin_s'])) ? $data['horafin_s'] : '0';
            $data['horafin_d'] = (isset($data['horafin_d'])) ? $data['horafin_d'] : '0';
            
            if($data['profesional'] != 0){                
              $horarioProfesional = Horario::where("id_profesional","=",$data['profesional'])->first();
            }
            else if(Session::get('tipohorario') == 2){
                return Redirect::route('agregarHorarioPeluqueria')->with('message', 'no_profesional')->withInput();   
            }
            else{
                return Redirect::route('agregarHorarioVeterinaria')->with('message', 'no_profesional')->withInput();
            }
                
            $horaini_l = explode(":",$data['horainicio_l']);
            $horafin_l = explode(":",$data['horafin_l']);
            
            $horaini_ma = explode(":",$data['horainicio_ma']);
            $horafin_ma = explode(":",$data['horafin_ma']);
            
            $horaini_mi = explode(":",$data['horainicio_mi']);
            $horafin_mi = explode(":",$data['horafin_mi']);
            
            $horaini_j = explode(":",$data['horainicio_j']);
            $horafin_j = explode(":",$data['horafin_j']);
            
            $horaini_v = explode(":",$data['horainicio_v']);
            $horafin_v = explode(":",$data['horafin_v']);
            
            $horaini_s = explode(":",$data['horainicio_s']);
            $horafin_s = explode(":",$data['horafin_s']);
            
            $horaini_d = explode(":",$data['horainicio_d']);
            $horafin_d = explode(":",$data['horafin_d']);
            
            if(  ((($horafin_l[0]-$horaini_l[0]) < 0) && (Session::get('tipohorario') == 2)  )  || ((($horafin_ma[0]-$horaini_ma[0]) < 0) && (Session::get('tipohorario') == 2)  ) ||
               ((($horafin_mi[0]-$horaini_mi[0]) < 0) && (Session::get('tipohorario') == 2)  )  || ((($horafin_j[0]-$horaini_j[0]) < 0) && (Session::get('tipohorario') == 2)  )   || 
                ((($horafin_v[0]-$horaini_v[0]) < 0) && (Session::get('tipohorario') == 2)  )   || ((($horafin_s[0]-$horaini_s[0]) < 0) && (Session::get('tipohorario') == 2)  ) ||
                    ((($horafin_d[0]-$horaini_d[0]) < 0) && (Session::get('tipohorario') == 2)  )){
                return Redirect::route('agregarHorarioPeluqueria')->with('message', 'hora_invalida');
            }
            else if(  ((($horafin_l[0]-$horaini_l[0]) < 0) && (Session::get('tipohorario') == 1)  )  || ((($horafin_ma[0]-$horaini_ma[0]) < 0) && (Session::get('tipohorario') == 1)  ) ||
               ((($horafin_mi[0]-$horaini_mi[0]) < 0) && (Session::get('tipohorario') == 1)  )  || ((($horafin_j[0]-$horaini_j[0]) < 0) && (Session::get('tipohorario') == 1)  )   || 
                ((($horafin_v[0]-$horaini_v[0]) < 0) && (Session::get('tipohorario') == 1)  )   || ((($horafin_s[0]-$horaini_s[0]) < 0) && (Session::get('tipohorario') == 1)  ) ||
                    ((($horafin_d[0]-$horaini_d[0]) < 0) && (Session::get('tipohorario') == 1)  )){
                return Redirect::route('agregarHorarioVeterinaria')->with('message', 'hora_invalida');
            }
            else{
            
            $horainicio = $data['horainicio_l'].','.$data['horainicio_ma'].','.$data['horainicio_mi'].','.$data['horainicio_j'].','.$data['horainicio_v'].','.$data['horainicio_s'].','.$data['horainicio_d'];
            $horafin = $data['horafin_l'].','.$data['horafin_ma'].','.$data['horafin_mi'].','.$data['horafin_j'].','.$data['horafin_v'].','.$data['horafin_s'].','.$data['horafin_d']; 
            
                if(empty($horarioProfesional))
                {
                $horario = new Horario();
                $horario->dias = "$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo";
                $horario->hora_inicio = $horainicio;
                $horario->hora_fin = $horafin;
                $horario->id_profesional = $data['profesional'];
                $horario->save();

                return Redirect::to('/home')->with('message', 'ok_update');
                }
                else
                {
                  return Redirect::route('agregarHorarioPeluqueria')->with('message', 'existe_horario'); 
                }
           } 
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
