<?php


class usuarioController{
    
public function index(){
    
    
    echo 'controlador usuarios accion index';
    
}



public function registro(){
    
    
    require_once 'views/usuario/registro.php';
    
    
    
  
    
}

public function save(){
    
    require_once 'models/usuario.php';
    
    
    
    if (isset($_POST)){
        
       $usuario = new Usuario();
       $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
         $usuario->setEmail($_POST['email']);
          $usuario->setPassword($_POST['password']);
          
       
          var_dump($usuario);
       
        
        
    }
    
 
    
    
    
}


    
}


