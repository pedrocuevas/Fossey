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
            
            $horarioProfesional = Horario::where("id_profesional","=",$data['profesional'])->first();
            
            if(empty($horarioProfesional))
            {
            $horario = new Horario();
            $horario->dias = "$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo";
            $horario->hora_inicio = $data['horainicio'];
            $horario->hora_fin = $data['horafin'];
            $horario->id_profesional = $data['profesional'];
            $horario->save();

            return Redirect::to('/home')->with('message', 'ok_update');
            }
            else
            {
              return Redirect::route('agregarHorarioPeluqueria')->with('message', 'existe_horario'); 
            }    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
