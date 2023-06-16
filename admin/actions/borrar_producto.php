<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

if($id){
    (new Carrito())->eliminar_producto($id);
    header('Location: ../../carritocompras.php');
}