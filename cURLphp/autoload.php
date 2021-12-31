<?php
//----------------------------------------
//Cargar todas las clases
//----------------------------------------
//Esta variable nos ayudara con las rutas del archivo, es lo mismo que un '/'
define('DS', DIRECTORY_SEPARATOR);
// 
function app_autoload($classname)
{
    $classname = __DIR__.DS.str_replace('\\', DS, $classname).'.php';
    require_once $classname;
}

spl_autoload_register('app_ autoload');