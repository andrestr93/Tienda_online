<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();

        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function ver() {

        if (isset($_GET['id'])) {
            
            // conseguir Categoria

            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();
            
            // conseguir producto
            
            $producto = new Producto();
           
            $producto->setCategoria_id($_GET['id']);
            $productoscat = $producto->getProdCategory();
            
     
            
           
        }

        require_once 'views/categoria/ver.php';
    }

    public function save() {

        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            // Guardar la categoria en bd

            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        header("Location:" . base_url . "categoria/index");
    }

}
