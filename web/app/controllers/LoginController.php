<?php

class LoginController extends BaseController {
    
    
    public function validaLogin() {
        
        $data = Input::all();
        
        $user = $data['usuario'];
        $pass = $data['contraseña'];
        
        $password =  hash('sha256', $pass);
        
        $valida = Usuario::find(1);
        
        if(($valida->usuario == $user) && ($valida->pass == $password)){
          echo "Contraseña Correcta";   
         }
         else{
          echo "Contraseña Inválida";   
         }
        
       
    }   
    
    
}

