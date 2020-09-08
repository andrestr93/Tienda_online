<?php



function autocargar($classname){
    

  require_once 'controllers/' . strtolower($classname) . '.php';
}

// invocamos funcion sql autoload register pasandole la funcion

spl_autoload_register('autocargar');



