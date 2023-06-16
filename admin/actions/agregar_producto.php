<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;
$cantidad= $_GET['cantidad'] ?? FALSE;

if($id){
   (new Carrito())->agregar_producto($id, $cantidad);
    header('Location: index.php?seccion=carritocompras');
}