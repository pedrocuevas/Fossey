<?php

class ProfesionalMantenedorController extends BaseController {

    public function agregar() {
        
     
        $data = Input::all(); 
        $rutsindigito = substr($data['rut'], 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);
       
        $profesional = New Profesional();
        $buscaPropietario = Propietario::where('rut','=',$rut);
        
        $reglas = array('nombres'           => 'alpha_spaces|required|min:4|max:80', 
                        'direccion'         => 'required',
                        'correo'            => 'email|unique:propietarios,email' ,
                        'fono'              => 'digits:8',
                        'genero'            => 'boolean',
                        'titulo'            => 'alpha_spaces|required|min:4|max:40',
                        'fecha_nac'         => 'before:'.date("d-m-Y"),
                        'institucion'       => 'alpha_spaces|required|min:4|max:80'
            );
        
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
            return Redirect::route('agregarProfesional')->withErrors($validador);
        }
        else{
            if(empty($buscaPropietario))
            {    
            $profesional->rut = $rut;    
            $profesional->nombres = $data['nombres'];
            $profesional->apellidos = $data['apellidos'];
            $profesional->comuna_id = $data['comunas'];
            $profesional->direccion = $data['direccion'];
            $profesional->genero = $data['genero'];
            $profesional->email = $data['correo'];
            $profesional->telefono = $data['fono'];
            $profesional->titulo_profesional = $data['titulo'];
            $profesional->institucion = $data['institucion'];
            $profesional->fecha_nacimiento = $data['fecha_nac'];
            $profesional->tipo_id = $data['tipo'];
            $profesional->save();

           return Redirect::to('/home')->with('message','ok_update');
            }
            else{
                 Input::flash();
                 return Redirect::route('agregarProfesional')->withInput()->with('message','rut_existe');
             }
        
          
           }

        }  
    
    
       public function busqueda() {

        $data = Input::all();         
        $reglas = array('rut' =>  'required');
                
        $validador = Validator::make($data, $reglas);
        
        if($validador->fails()){
             return Redirect::route('buscarProfesionalMantenedor')->withErrors($validador); 
        } 
        $rutsindigito = substr($data['rut'], 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);

        $profesional = Profesional::where('rut', '=', $rut)->first();
        
        
        
        
        if(empty($profesional)){
          return Redirect::route('buscarProfesionalMantenedor')->with('message','no_profesional');  
        }
          else{
              
             Session::put('id_pro', $profesional->id);
             Session::put('nombres_pro', $profesional->nombres);
             Session::put('comuna_id_pro', $profesional->comuna_id);
             Session::put('direccion_pro', $profesional->direccion);
             Session::put('rut_pro', $profesional->rut); 
             Session::put('genero_pro', $profesional->genero);
             Session::put('correo_pro', $profesional->email);
             Session::put('fono_pro', $profesional->telefono); 
     
            return View::make('mantenedor.profesional.mantenedorProfesional',array(
                              'nombres' => $profesional->nombres,
                              'apellidos' => $profesional->apellidos,
                              'rut' => $profesional->rut,
                              'id'=> $profesional->id));
          }
       }
    
}   

