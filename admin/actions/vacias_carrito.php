<?PHP
require_once "../../funciones/autoload.php";

(new Carrito())->vaciar_carrito();
header('Location: ../../carritocompras.php');