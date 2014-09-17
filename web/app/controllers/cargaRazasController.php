<?php

class cargaRazasController extends BaseController {

    public function razas() {
          $input = Input::get('option');
          $razas = Especie::find($input)->razas->lists('nombre','id');
          $combobox = array(0 => "Seleccione una raza ") + $razas;
        

        return Response::json($combobox);
       }
       
    }
