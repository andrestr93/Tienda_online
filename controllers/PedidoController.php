<?php

require_once 'models/pedido.php';

class pedidoController {

    public function hacer() {

        require_once 'views/pedido/hacer.php';
    }

    public function add() {

        if (isset($_SESSION['identity'])) {

            $usuario_id = $_SESSION['identity']->id;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;

            $stats = Utils::stackcarrito();
            $coste = $stats['total'];

            // guardar datos en la base de datos 

            if ($provincia && $direccion && $localidad) {
                $pedido = new Pedido();
                $pedido->setDireccion($direccion);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setCoste($coste);

// guardar pedido 
                $save = $pedido->save();
                // guardar linea pedido
                $linea_save = $pedido->saveLinea();




                if ($save && $linea_save) {

                    $_SESSION['pedido'] = "complete";
                } else {


                    $_SESSION['pedido'] = "failed";
                }
            } else {

                $_SESSION['pedido'] = "failed";
            }


            header("Location:" . base_url . 'pedido/confirmado');
        } else {

            header("Location:" . base_url);
        }
    }

    public function confirmado() {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedidos_productos = new Pedido();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();
            $productos = $pedidos_productos->getProductosByPedidos($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos() {

        Utils::isIdentity();

        $pedido = new Pedido();
        $usuario_id = $_SESSION['identity']->id;

        // sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);

        $pedidos = $pedido->getAllByUser();




        require_once 'views/pedido/pedidos.php';
    }

    public function detalle() {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // Sacar los poductos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedidos($id);

            require_once 'views/pedido/detalle.php';
        } else {
            header('Location:' . base_url . 'pedido/mis_pedidos');
        }
    }

    public function gestion() {

        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();

        $pedidos = $pedido->getAll();


        require_once 'views/pedido/pedidos.php';
    }

    public function estado() {

        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            // Recoger datos form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // Upadate del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateOne();

            header("Location:" . base_url . 'pedido/detalle&id=' . $id);
        } else {
            header("Location:" . base_url);
        }
    }


}
