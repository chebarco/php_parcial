<?PHP
require_once '../../funciones/autoload.php';

$dataPost = $_POST;

$id = $_GET['id'] ?? FALSE;

try {

    $catalogo = (new Catalogo())->getxId($id);

    $catalogo->edit(
        $dataPost['nombre_vitamina'],
        $dataPost['cantidad'],
        $dataPost['tipo'],
        $dataPost['precio'],
        $dataPost['fecha'],
   );
if ($catalogo){
    (new Notificaciones())->add_alerta('success', "Producto editado correctamente!🌈");
    header('Location: ../index.php?seccion=adminCatalogo');

}else{
    (new Notificaciones())->add_alerta('danger', "No se pudo editar el producto!🪦");
    header('Location: ../index.php?seccion=adminCatalogo');
}
} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    die("No se pudo cargar el producto R.I.P 🪦");
}
