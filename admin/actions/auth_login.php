<?PHP
require_once '../../funciones/autoload.php';

$postData = $_POST; // Datos enviados por el formulario de login

$login = (new Autenticacion())->login($postData['nombre_usuario'], $postData['clave']);

if ($login) {
    header('Location: ../index.php?seccion=panel');
} else {
    header('Location: ../index.php?seccion=login');
}