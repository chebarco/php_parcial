<?PHP
require_once '../../funciones/autoload.php';

$id = $_GET['id'] ?? FALSE;

$catalogo = (new Catalogo())->getxId($id);

try{
    $catalogo->delete();
    header('Location: ../index.php?seccion=adminCatalogo');
} catch (Exception $e) {
    die("No se pudo cargar el producto R.I.P 🪦");
}