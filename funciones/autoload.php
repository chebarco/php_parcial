<?PHP
session_start();

function autoloadClasses($nombreClase){

    $archivo = __DIR__ . "/../classes/$nombreClase.php";
    require_once $archivo;

    if(file_exists($archivo)){
        require_once  $archivo;
    }else{
        die("No se pudo cargar la clase: $nombreClase");
    }

}

spl_autoload_register('autoloadClasses');