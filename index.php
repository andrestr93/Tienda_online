
<?php
session_start();

require_once 'autoload.php'; // cargamos todos los modelos 
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';




function error() {

    $error = new errorController();

    $error->index();
}

if (isset($_GET['controller'])) { // compruebo si me llega el controlador 
    
    $nombrecontrolador = $_GET['controller'] . 'Controller'; // guardamos en una variable lo que nos llega por $_get que seria la clase 
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

    $nombrecontrolador = controller_defaut;
} else {

    error();
    exit();
}

if (class_exists($nombrecontrolador)) { // si existe la clase creo el objeto
    // $nombrecontrolador ( Te coge el nombre de la clase que te llega a traves de $_get
    $controlador = new $nombrecontrolador;




    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {    //comprobamos accion y  si existe el metodo dentro de la clase 
        $action = $_GET['action'];

        $controlador->$action(); // invocamos el metodo con la accion 
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) { // si no existe el controller ni la accion cargamos una pagina por defecto

        $default = action_default;
        

        $controlador->$default(); // invocamos el metodo con la accion 
    } else { // sino da error diciendo la pgina web no existe 
        error();
    }
} else { // sino da error diciendo la pgina web no existe 
    error();
}

require_once 'views/layout/footer.php';

