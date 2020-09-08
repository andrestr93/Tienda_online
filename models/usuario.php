<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    
    function getId() {
        return $this->id;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDb($db) {
        $this->db = $db;
    }

        
    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }


    public function save(){
        
        $sql ="INSERT INTO VALUES (null , '{$this->nombre}' ,  '{$this->apellidos}' ,'{$this->email}' ,'{$this->password}' , 'user' , null)";
        
        
        $save = $this->db->query($sql);
        
        
    }

}
