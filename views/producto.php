<?PHP
require_once "./classes/Catalogo.php";

$idVitamina = $_GET['id'] ?? FALSE;

$objetoVitaminaId = new  Catalogo();
$detallevitaminaProducto = $objetoVitaminaId->productoId($idVitamina);

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Aquí encontraras el
            <span class="titulo-producto"><?= $titulo ?></span>
        </h1>
        <div class="row">
            <?PHP if (!empty($detallevitaminaProducto)) { ?>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./imagenes/productos/<?= $detallevitaminaProducto->getImagen() ?>" class="card-img-top" alt="Portada de <?= $detallevitaminaProducto->getVitamina() ?> ">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">

                                <h2 class="card-title titulo"><?= $detallevitaminaProducto->getVitamina() ?></h2>
                                <p class="card-text"><?= $detallevitaminaProducto->getCantidad() ?>.</p>
                                <p class="card-text"><?= $detallevitaminaProducto->getDescripcion() ?>.</p>
                                <p class="card-text descripcion"><?= $detallevitaminaProducto->getCapsula() ?>.</p>
                                <p class="card-text descripcion"><?= $detallevitaminaProducto->getCategoriaCatalogo() ?>.</p>
                                <p class="card-text descripcion color"><?= $detallevitaminaProducto->getTipo() ?>.</p>
                                <p class="card-text descripcion color">Fecha de Vencimiento<?= $detallevitaminaProducto->getFecha() ?>.</p>
                                <?PHP foreach ($detallevitaminaProducto->categoriaSecundaria() as $value) { ?>

                                    <p class="card-text descripcion fst-italic">Tambien encontraras este producto en: <?= $value->getCategoria(); ?></p>

                                <?PHP  } ?>
                                <div class="fs-3 mb-3 fw-bold">$<?= $detallevitaminaProducto->getPrecio() ?>

                        
                                </div>
                                <form action="admin/actions/agregar_producto.php" method="GET">
                                    <div class="col-6 d-flex mb-3">
                                        <label for="cantidad" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="10">
                                   
                                        <input type="submit" value="agregar" class="btn btn-outline-secondary" >
                                        <input value="<?= $id->getId() ?>" type="hidden" name="id">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                <?PHP } else { ?>
                    <div class="col">
                        <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
                    </div>
                <?PHP } ?>
                </div>
        </div>