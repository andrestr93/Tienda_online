<?php

class Producto {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
            private$fecha;
    private $imagen;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function getAll() {

        $sql = "SELECT * FROM PRODUCTOS ORDER BY id DESC";

        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getProdCategory() {

        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
                . "INNER JOIN categorias c ON c.id = p.categoria_id "
                . "WHERE p.categoria_id = {$this->getCategoria_id()} "
                . "ORDER BY id DESC";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getone() {

        $sql = "SELECT * FROM PRODUCTOS WHERE id={$this->getId()}";

        $producto = $this->db->query($sql);


        return $producto->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO productos VALUES ( NULL ,  {$this->categoria_id} , '{$this->getNombre()}' ,'{$this->getDescripcion()}' , {$this->getPrecio()} , {$this->stock}  ,  null  , CURDATE() , '{$this->getImagen()}');";


        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete() {

        $sql = "DELETE FROM productos WHERE id =  {$this->getId()};";

        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function modify() {

        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}'  , descripcion = '{$this->descripcion}' , precio = '{$this->precio}' , stock ={$this->getstock()} , categoria_id= {$this->getcategoria_id()} ";

        if ($this->getImagen() != null) {

            $sql .= " , imagen ='{$this->getImagen()}' ";
        }

        $sql .= " WHERE id={$this->getId()};";

        $modify = $this->db->query($sql);

        $result = false;
        if ($modify) {
            $result = true;
        }
        return $result;
    }

    public function getRandom($limit) {

        $sql = "SELECT* FROM productos ORDER BY RAND() LIMIT $limit";

        $productos = $this->db->query($sql);
        return $productos;
    }

}
