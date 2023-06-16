<?PHP

require_once "../funciones/autoload.php";
//clave123
//usuario cecilia_b



$paginasValidas = [
  "login" =>[
    "titulo" => "Inicio de sesion",
    "restringido" => FALSE

  ],
  "panel" => [
    "titulo" => "Panel de Control",
    "restringido" => TRUE

  ],
  "adminCatalogo" => [
    "titulo" => "Administrador Catalogo",
    "restringido" => TRUE

  ],
  "addcatalogo" => [
    "titulo" => "Agregar producto al Catalogo",
    "restringido" => TRUE

  ],
  "deleteCatalogo" => [
      "titulo" => "Eliminar datos de Producto",
      "restringido" => TRUE
  ],
  "editCatalogo" => [
      "titulo" => "Editar datos de Producto",
      "restringido" => TRUE
  ],
];

$seccionPaginas = $_GET['seccion'] ?? 'panel';


if (!array_key_exists($seccionPaginas, $paginasValidas)) {
  $vista = "404";
  $titulo = "404";
} else {
  $vista = $seccionPaginas;
  $titulo = $paginasValidas[$seccionPaginas]['titulo'];
} //aca me fijo si la seccion que me piden existe, si no existe, muestro la 404


$usserData = $_SESSION['loggedIn'] ?? FALSE;




?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Londrina+Sketch&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css">
  <title>Zenement :: <?= $titulo ?> </title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
            <li class="nav-item " >
            <a class="nav-link active " aria-current="page" href="../index.php?seccion=home">Ir a tienda</a>
          </li>
      <li class="nav-item <?= $usserData ? "" : "d-none" ?>" >
        <a class="nav-link active" aria-current="page" href="index.php?seccion=panel">Home</a>
        </li>
        <li class="nav-item <?= $usserData ? "" : "d-none" ?>" >
        <a class="nav-link active" aria-current="page" href="index.php?seccion=adminCatalogo">Editar Catalogo</a>
        </li>
        <li class="nav-item <?= $usserData ? "" : "d-none" ?>" >
        <a class="nav-link active" aria-current="page" href="index.php?seccion=addcatalogo">Agregar Producto</a>
        </li>
    
        <li class="nav-item  <?= $usserData ? "d-none" : "" ?> ">
            <a class="nav-link active ingresar" aria-current="page" href="index.php?seccion=login">Ingresar</a>
          </li>
          <li class="nav-item <?= $usserData ? "" : "d-none" ?>" >
            <a class="nav-link active" aria-current="page" href="actions/auth_logout.php">Salir</a>
          </li>
  
      </ul>
    </div>
  </div>
</nav>



<main class="container">

<?PHP
require_once file_exists("viewsadmin/$vista.php") ? "viewsadmin/$vista.php" : "./viewsadmin/404.php";
?>

</main>




<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">Panel de administrador 2023</p>
  </footer>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>