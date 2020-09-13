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

    public function save() {

        Utils::isAdmin();

// si existe el post 
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;

            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;

            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;

            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

// si hay datos en las variables

            if ($nombre && $descripcion && $precio && $stock && $categoria) {

                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);



                //guardar imagen 
                // cogemos el nombre y el tipo 
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];



                if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                    // si no existe el directorio lo creamos con los permisos y a true 
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }


                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);

                    $producto->setImagen($filename);
                }




// ejecutamos metodo 
                $save = $producto->save();

// si el metodo da true 

                if ($save) {

                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");
    }

    public function modify() {

        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $edit = true;
            
            $producto = new Producto();
            $producto->setId($_GET['id']);
           $pro =  $producto->getone();
            require_once 'views/producto/crear.php';
            
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function delete() {


        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $producto = new Producto();

            $id = $_GET['id'];

            $producto->setId($id);

            $delete = $producto->delete();

            if ($delete) {

                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }

            header("Location:" . base_url . "producto/gestion");
        }
    }

}
