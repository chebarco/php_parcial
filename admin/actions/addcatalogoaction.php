<?php
require_once '../../funciones/autoload.php';


// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$dataPost = $_POST;
$fileData = $_FILES['imagen'];

try {
    $catalogo = new Catalogo();
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../imagenes/productos", $fileData);

    $catalogo->insert(
        $dataPost['categoria_id'],
        $dataPost['nombre_vitamina'],
        $dataPost['cantidad'],
        $dataPost['tipodecapsula_id'],
        $dataPost['descripcion'],
        $dataPost['tipo'],
        $dataPost['ingredientes'],
        $imagen,
        $dataPost['precio'],
        $dataPost['fecha'],
    );
if ($catalogo) {
    (new Notificaciones())->add_alerta('success', "Producto cargado correctamente!🥳");
    header('Location: ../index.php?seccion=adminCatalogo');

}else{
    (new Notificaciones())->add_alerta('danger', "No se pudo editar el producto!🪦");
    header('Location: ../index.php?seccion=adminCatalogo');
}

} catch (Exception $e) {
//     echo "<pre>";
// print_r($e);
// echo "</pre>";
    die("No se pudo cargar el producto R.I.P 🪦");
}



