<?PHP
$id = $_GET['id'] ?? FALSE;
$catalogo = (new Catalogo())->getxId($id);

$categorias = (new Categoria())->lista_completa();
$capsula = (new Comprimido())->lista_completa();

?>


<div class=" justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold text-black">¿Seguro quieres editar este producto?</h1>
    </div>
    <div class="row mb-5 d-flex aling-items-center border">

        <form class="row g-3" action="actions/edit_catalogo.php?id=<?= $catalogo->getId() ?>" method="POST" enctype="multipart/form-data">
        <div class="col-md-6 mb-3 imagen-edit">
            <img src="../imagenes/productos/<?= $catalogo->getImagen() ?>" alt="Imágen de <?= $catalogo->getVitamina() ?>" class="img-fluid rounded imagen-edit" width="50%">
        </div>
        
        <div class=" mb-3">
                <label for="nombre_vitamina" class="form-label">Nombre Vitaminas</label>
                <input type="text" class="form-control" id="nombre_vitamina" name="nombre_vitamina" value="<?= $catalogo->getVitamina() ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $catalogo->getTipo() ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?= $catalogo->getCantidad() ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $catalogo->getFecha() ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?= $catalogo->getPrecio() ?>">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </div>
</div>