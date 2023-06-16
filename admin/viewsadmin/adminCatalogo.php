<?php
$listaCatalogoAmind = (new Catalogo)->catalogo_completo();

?>


<div class="container py-5">
    <div>
        <h1 class="text-center mb-5 fw-bold text-black">¡Administración de catálogo!</h1>
        <h2 class="text-center">Edita o borra tus productos de manera sencilla</h2>
    </div>
    <?= (new Notificaciones())->get_alertas(); ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col">Modificaciones</th>
                    <th scope="col">ID</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Vitamina</th>
                    <th scope="col">Tipo de cápsula</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Categoría secundaria</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCatalogoAmind as $catalogoAdmin) { ?>
                    <tr>
                        <td>
                        <a href="index.php?seccion=editCatalogo&id=<?= $catalogoAdmin->getId() ?>" role="button" class="d-block btn btn-sm btn-secondary boton-form">Editame</a>
                        <a href="index.php?seccion=deleteCatalogo&id=<?= $catalogoAdmin->getId() ?>" role="button" class="d-block btn btn-sm btn-danger boton-form">Eliminame</a>
                        </td>
                        <td><?= $catalogoAdmin->getId() ?></td>
                        <td><?= $catalogoAdmin->getCategoriaCatalogo()?></td>
                        <td><?= $catalogoAdmin->getVitamina() ?></td>
                        <td><?= $catalogoAdmin->getCapsula() ?></td>
                        <td><?= $catalogoAdmin->getCantidad() ?></td>
                        <td><?= $catalogoAdmin->getTipo() ?></td>
                        <td><?= $catalogoAdmin->getPrecio() ?></td>
                        <td><?= $catalogoAdmin->getFecha() ?></td>
                        <td>
                            <?php
                            foreach($catalogoAdmin->categoriaSecundaria() as $CS){
                                echo "<p>".$CS->getCategoria()."</p>";
                            }
                            ?>
                        </td>
                        <td>
                            <img src="../imagenes/productos/<?= $catalogoAdmin->getImagen() ?>" alt="Imágen Ilustrativa de <?= $catalogoAdmin->getVitamina() ?>" class="img-fluid rounded shadow-sm">
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php?seccion=addcatalogo" role="button" class="btn btn-sm btn-secondary mt-3">Agregar un producto</a>
    </div>
</div>


