<?PHP
require_once "./classes/Catalogo.php"; 

$objetoVitaminaDestacado = new  Catalogo();
$productos_destacados = $objetoVitaminaDestacado->mostrar_productos_destacados();

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h4 class="text-center mb-5 fw-bold">Nuestros favoritos del mes
        </h4>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php foreach ($productos_destacados as $vitamina) { ?>

                    <div class="col">
                        <div class="card h-100 borde">
                            <img src="./imagenes/productos/<?= $vitamina->getImagen() ?>" class="card-img-top imagenProducto" alt="Portada de <?= $vitamina->getVitamina() ?> ">
                            <div class="card-body">
                                <h3 class="card-title titulo"><?= $vitamina->getVitamina()?></h3>
                                <p class="card-text"><?= $vitamina->getCantidad() ?>.</p>
                            </div>
                            <div class="card-body">
                                <div class="fs-3 mb-3 fw-bold text-center precio">$<?= $vitamina->getPrecio() ?></div>
                                <button class="btnr w-100 fw-bold boton-ofer"> <a href="index.php?seccion=producto&id=<?= $vitamina->getId() ?>">VER MAS</a></button>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>