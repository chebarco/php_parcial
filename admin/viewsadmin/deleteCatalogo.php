<?PHP

$id = $_GET['id'] ?? FALSE;
$catalogo = (new Catalogo())->getxId($id);


?>

<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este producto?</h1>
<div class="card mb-3 card-delete" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../imagenes/productos/<?= $catalogo->getImagen() ?>" alt="Imágen Illustrativa de <?= $catalogo->getVitamina() ?>" class="img-fluid rounded">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="delete-nombre"><?= $catalogo->getVitamina() ?></p>
        <p><?= $catalogo->getCantidad() ?></p>
        <p><?= $catalogo->getTipo() ?></p>

        <a href="actions/delete_catalogo.php?id=<?= $catalogo->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 ">Eliminar</a>
      </div>
    </div>
  </div>
</div>