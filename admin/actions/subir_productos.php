<?PHP
require_once "../../funciones/autoload.php";

$postData = $_POST ?? FALSE;

if(!empty($postData)){
   (new Carrito())->subir_producto($postData['cantidad']);
    $vitamina->guardar();
    header('Location: ../../index.php?seccion=agregar_producto.php');
}