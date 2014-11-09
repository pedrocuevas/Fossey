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
       $medicamento = Medicamento::find($data['medicamentos']);
       
       $dosis_min = $medicamento->dosis_min;
       $dosis_max = $medicamento->dosis_max;
       $frecuencia = $medicamento->frecuencia;
       
       $calculo_min = $dosis_min * $data['peso'];
       $calculo_max = $dosis_max * $data['peso'];
       $calculo_prom = (($dosis_min+$dosis_max)/2) * $data['peso'];
       
       echo "Dosis Mínima:.$calculo_min.";
       echo "Dosis Máxima:.$calculo_max.";
       echo "Dosis Promedio:.$calculo_prom.";
       echo "Frecuencia:.$frecuencia.";
        
    }
}
