<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold"> Resultado de Busqueda</h1>
        <div class="container">

            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php foreach ($results as $result) { ?>

                    <div class="col">
                        <div class="card h-100 borde">
                            <img src="./imagenes/productos/<?= $result->getImagen() ?>" class="card-img-top" alt="Portada de <?= $result->getVitamina() ?> ">
                            <div class="card-body">
                                <h2 class="card-title titulo"><?= $result->getVitamina() ?></h2>
                                <p class="card-text"><?= $result->getCantidad() ?>.</p>
                                <p class="card-text descripcion"><?= $result->textoCorto(20) ?>.</p>
                                <p class="card-text descripcion color"><?= $result->getTipo() ?>.</p>
                                <p class="card-text descripcion color">Fecha de Vencimiento <?= $result->getFecha() ?>.</p>


                            </div>
                            <div class="card-body">
                                <div class="fs-3 mb-3 fw-bold text-center">$<?= $result->getPrecio() ?></div>
                                <button class="btnr w-100 fw-bold boton"> <a href="index.php?seccion=producto&id=<?= $result->getId() ?>">VER MAS</a></button>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>