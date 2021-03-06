<?php

require_once 'models/producto.php';

class productoController {

    public function index() {

        $producto = new Producto();

        $productos = $producto->getRandom(6);



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
                } else {
                    $_SESSION['producto'] = 'failed';
                }


                if (isset($_GET['id'])) {

                    $id = $_GET['id'];

                    $producto->setId($id);

                    $editar = $producto->modify();

                    if ($editar) {

                        $_SESSION['producto'] = 'complete';
                    } else {
                        $_SESSION['producto'] = 'failed';
                    }
                } else {

                    $guardar = $producto->save();

                    if ($guardar) {

                        $_SESSION['producto'] = 'complete';
                    } else {
                        $_SESSION['producto'] = 'failed';
                    }
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
            $pro = $producto->getone();
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

    public function ver() {

        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $product = $producto->getone();

        } 
            require_once 'views/producto/ver.php';
        }
    }


