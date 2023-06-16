<?PHP
$tipoSeleccionado = $_GET['tipo'] ?? FALSE;


require_once "./classes/Catalogo.php";

$objetoTipo = new  Catalogo();
$tipoDeCapsula = $objetoTipo->catalogoTipoCapsula($tipoSeleccionado);

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">La medicina que tu cuerpo necesita </h1>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php foreach ($tipoDeCapsula as $producto) { ?>

                    <div class="col">
                        <div class="card h-100 borde">
                            <img src="./imagenes/productos/<?= $producto->getImagen() ?>" class="card-img-top" alt="Portada de <?= $producto->getVitamina() ?> ">
                            <div class="card-body">
                                <h2 class="card-title titulo"><?= $producto->getVitamina() ?></h2>
                                <p class="card-text"><?= $producto->getCantidad() ?>.</p>
                                <p class="card-text descripcion"><?= $producto->getCapsula() ?>.</p>
                                <p class="card-text descripcion"><?= $producto->textoCorto(20) ?>.</p>
                                <p class="card-text descripcion color"><?= $producto->getTipo() ?>.</p>

                            </div>
                            <div class="card-body">
                                <div class="fs-3 mb-3 fw-bold text-center">$<?= $producto->getPrecio() ?></div>
                                <button class="btnr w-100 fw-bold boton"> <a href="index.php?seccion=producto&id=<?= $producto->getId() ?>">VER MAS</a></button>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>