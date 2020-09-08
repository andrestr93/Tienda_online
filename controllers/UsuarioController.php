<?php

require_once 'models/usuario.php';

class usuarioController {

    public function index() {


        echo 'controlador usuarios accion index';
    }

    public function registro() {


        require_once 'views/usuario/registro.php';
    }

    public function save() {



        if (isset($_POST)) {

            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $guardar = $usuario->save();


            if ($guardar) {
                
                $_SESSION['registrer'] = "complete";
           
            } else {

                $_SESSION['registrer'] = "complete";
            }
        }else{
                            $_SESSION['registrer'] = "failed";
                            

        }
                            header("Location:".base_url."usuario/registro");
    }

}
