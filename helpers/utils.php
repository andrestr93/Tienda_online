<?php

class Utils{
    
    
    // funcion que permite borrar la sesion 
    
    
    public static function deleteSsesion($name){
       
        if(isset($_SESSION[$name])){
            
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
            
        }
       
        
        return $name;
        
        
    }
    
    public static function isAdmin(){
        
        if (!isset($_SESSION['admin'])){
            
            header("Location:".base_url);
            
        } else{
            return true;
        }
    }
    
    
    public static function showCategorias(){
        require_once 'models/categoria.php';
        
        $categoria = new Categoria();
        
        $categorias = $categoria->getAll();
        
        return $categorias;
        
        
    }
    
}