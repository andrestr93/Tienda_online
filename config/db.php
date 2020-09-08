<?php


class Database{
    
    public static function connect() {
        
        
          $bd = "tienda__master";
        $usuario = "root";
        $pass = "";
        $servidor = "localhost:3308";

        $db = new mysqli($servidor, $usuario, $pass, $bd); // establecemos conexion con base de datos

        $db->query("SET NAMES 'utf8' "); // EJECUTAMOS CONSULTA

        return $db;
    }
        
       
        
        
    }
