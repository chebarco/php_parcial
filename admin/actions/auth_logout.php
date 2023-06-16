<?PHP

require_once '../../funciones/autoload.php';

(new Autenticacion())->logout();
header('Location: ../index.php?seccion=login');