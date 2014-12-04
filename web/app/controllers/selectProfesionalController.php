<?php

class selectProfesionalController extends BaseController {

    public function profesional() {
          $input = Input::get('option');
          $profesional = Profesional::where('tipo_id','=',$input)->lists('nombres','id');
          $combobox = array(0 => "Seleccione un profesional ") + $profesional;
        

        return Response::json($combobox);
       }
       
    }
