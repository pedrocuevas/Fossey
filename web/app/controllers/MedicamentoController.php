<?php

class MedicamentoController extends BaseController {

    public function agregarMedicamento() {

        $data = Input::all(); 
        $buscaMedicamento = Medicamento::where('nombre_generico','=',$data['nombre_generico'])->pluck('id');
         
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
            $medicamento->save();
            return Redirect::route('agregarMedicamento')->with('message','medicamento_add');
        }
        else
        {
           return Redirect::route('agregarMedicamento')->with('message','medicamento_existe');
        }
                
    }
    
    public function calcularDosis(){
        
       $data = Input::all(); 
      // $medicamento = Medicamento::find(1);
     $medicamento = Medicamento::where('nombre_generico', '=', $data['busqueda'])
                                ->where('tipo','=', Session::get('iddosis'))
                                ->orwhere('nombre_generico', '=', $data['busqueda'])
                                ->where('tipo','=',3)->get()->toArray();
      //$medicamento = DB::table('medicamentos')->where('id', '=', '1')->get();
      

       
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
