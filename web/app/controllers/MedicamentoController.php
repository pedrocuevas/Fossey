<?php

class MedicamentoController extends BaseController {

    public function agregarMedicamento() {

        $data = Input::all(); 

        
        $reglas = array(
                        'nombre_generico'          => 'alpha_spaces|required|min:4|max:80', 
                        'nombre_comercial'         => 'alpha_spaces|min:4|max:80', 
                        'dosis_min'                => 'numeric|digits_between:1,3|required',
                        'dosis_max'                => 'numeric|digits_between:1,3|required' 
                );
                
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
            return Redirect::route('agregarMedicamento')->withErrors($validador);
        }
        else{
            $buscaMedicamento = Medicamento::where('nombre_generico','=',$data['nombre_generico'])->
                                         where('tipo','=',$data['tipo'])->pluck('id');
            if( empty($buscaMedicamento) )
            { 
                $medicamento = New Medicamento();    
                $medicamento->nombre_generico = $data['nombre_generico'];
                $medicamento->nombre_comercial = $data['nombre_comercial'];
                $medicamento->dosis_min = $data['dosis_min'];
                $medicamento->dosis_max = $data['dosis_max'];
                $medicamento->frecuencia = $data['frecuencia'];
                $medicamento->descripcion = $data['descripcion'];
                $medicamento->contraindicaciones = $data['contraindicaciones'];
                $medicamento->tipo = $data['tipo'];
                $medicamento->save();
                return Redirect::route('agregarMedicamento')->with('message','medicamento_add');
            }
            else
            {
               return Redirect::route('agregarMedicamento')->with('message','medicamento_existe');
            }
        }
                
    }
    
    public function calcularDosis(){
        
       $data = Input::all(); 


       $reglas = array(
                        'nombre_generico'          => 'alpha_spaces',  
                        'peso'                     => 'numeric|digits_between:1,3|required' 
                );
       
       $validador = Validator::make($data, $reglas);
       
       if($validador->fails()){
           return Redirect::to('/medicamentos/calcularDosis'.Session::get('iddosis'))->withErrors($validador);
       }
       else{
            $medicamento = Medicamento::where('nombre_generico', '=', $data['busqueda'])
                           ->where('tipo','=', Session::get('iddosis'))
                           ->orwhere('nombre_generico', '=', $data['busqueda'])
                           ->where('tipo','=',3)->get()->toArray();
       

            $dosis_min = $medicamento[0]['dosis_min'];
            $dosis_max = $medicamento[0]['dosis_max'];
            $frecuencia = $medicamento[0]['frecuencia'];

            $calculo_min = $dosis_min * $data['peso'];
            $calculo_max = $dosis_max * $data['peso'];
            $calculo_prom = (($dosis_min+$dosis_max)/2) * $data['peso'];

             $data = array(  
                      'calculo_min'     => $calculo_min,
                      'calculo_max'     => $calculo_max,
                      'calculo_prom'    => $calculo_prom,
                      'frecuencia'      => $frecuencia
                    );
             Input::flash();
           //  return Redirect::to('medicamentos/calcularDosis')->with('datos',$data);
              return View::make('medicamentos.calcularDosis', $data);   
       }    
    }
}
