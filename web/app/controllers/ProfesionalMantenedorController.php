<?php

class ProfesionalMantenedorController extends BaseController {

    public function agregar() {
        
    try{    
     
        $data = Input::all(); 
        $rutsindigito = substr($data['rut'], 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);
       
        $profesional = New Profesional();
        $buscaPropietario = Propietario::where('rut','=',$rut);
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
      catch (Exception $e){    
         echo $e->getMessage();
       }
    }
    
       public function busqueda() {

        $rut = Input::get('rut');
        $rutsindigito = substr($rut, 0, -2); 
        $rut = str_replace(".", "", $rutsindigito);

        $profesional = Profesional::where('rut', '=', $rut)->first();
        
        
        
        
        if(empty($profesional)){
          echo "<script>alert('No se encontró propietario'); window.location='/Fossey/web/public/mantenedor/propietario/buscarPropietarioMantenedor'; </script>";
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

