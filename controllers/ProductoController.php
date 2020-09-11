<?php

require_once 'models/producto.php';

class productoController {

    public function index() {

        // renderizar una vista 


        require_once 'views/producto/destacados.php';
    }

    public function gestion() {

        Utils::isAdmin();
        $producto = new Producto();

        $productos = $producto->getAll();


        require_once 'views/producto/gestion.php';
    }

    public function crear() {

        Utils::isAdmin();

        require_once 'views/producto/crear.php';
    }

}
