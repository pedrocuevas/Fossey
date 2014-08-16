<?php

class LoginController extends BaseController {
    
    
    public function validaLogin() {
        
        $data = Input::all();
        
        $user = $data['usuario'];
        $pass = $data['contraseña'];
        
        $password =  hash('sha256', $pass);
        
        $valida = Usuario::find(1);
        
        if(($valida->usuario == $user) && ($valida->pass == $password)){
          return View::make('registro');
         }
         else{
          return View::make('login');  
         }
        
       
    }   
    
    
}

