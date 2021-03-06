<?php

class RazaMantenedorController extends BaseController {

    public function agregar() {

        $data = Input::all(); 
        
        $reglas = array('nombre' => 'alpha_spaces|required|min:4|max:80',  );    
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
            return Redirect::route('agregarRaza')->withErrors($validador);
        }
        else{
        
        $buscaRaza = Raza::where('nombre','=',$data['nombre'])->first();
        
            if(empty($buscaRaza))
            {    
            $raza = new Raza();
            $raza->nombre = $data['nombre'];
            $raza->descripcion = $data['descripcion'];
            $raza->especie_id = $data['tipo'];
            $raza->save();
            return Redirect::route('agregarRaza')->with('message','raza_exito'); 
            }
            else
            {
              return Redirect::route('agregarRaza')->with('message','raza_existe');  
            }
         }
        }    
     public function buscar(){
         
         
         $data = Input::all();
       if($data['tipo'] != 0 && $data['raza'] != 0){ 
            $raza = Raza::find($data['raza']);

            Session::put('idraza',$data['raza']);
            Session::put('nombreraza',$raza->nombre);
            Session::put('descripcionraza',$raza->descripcion);
            Session::put('tiporaza', $raza->especie_id);

            $datos = array('raza' => $raza->nombre);

            return View::make('mantenedor.raza.mantenedorRazas',$datos);
       }
       else{
           return Redirect::route('buscarRaza');
       }
           
     } 
     
        public function borrar(){
           
           $raza = Raza::find(Session::get('idraza'));
           $raza->delete();
           return Redirect::route('buscarRaza')->with('message','ok_delete');
       }
       
       public function editar(){
           
           $data = Input::all();
           
           $raza = Raza::find(Session::get('idraza'));
           $raza->nombre = $data['nombre'];
           $raza->descripcion = $data['descripcion'];
           $raza->save();
           
           return Redirect::route('buscarRaza')->with('message','editar_ok');
       }
       
       
    }

