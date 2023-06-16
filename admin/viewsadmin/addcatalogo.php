<?PHP

$catalogo = (new Categoria())->lista_completa();
$comprimido = (new Comprimido())->lista_completa();

?>

<div class=" justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold text-black">¡Administración de catalogo!</h1>
        <h2> Agrega nuevos productos</h2>
    </div>
    <?= (new Notificaciones())->get_alertas(); ?>

    <div class="row mb-5 d-flex aling-items-center border">
        <form class="row g-3" action="actions/addcatalogoaction.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="nombre_vitamina" class="form-label">Nombre Vitaminas</label>
                <input type="text" class="form-control" id="nombre_vitamina" name="nombre_vitamina" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

      

            <div class="col-md-6 mb-3">
					<label for="categoria_id" class="form-label">Tipo de categoria</label>
					<select class="form-select" name="categoria_id" id="categoria_id" required>
						<option value="" selected disabled>Categoria</option>
						<?PHP foreach ($catalogo as $A) { ?>
                            <option value="<?= $A->getCategoriaId() ?>"><?= $A->getCategoria() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
					<label for="tipodecapsula_id" class="form-label">Tipo de Capsula</label>
					<select class="form-select" name="tipodecapsula_id" id="tipodecapsula_id" required>
						<option value="" selected disabled>Capsula</option>
						<?PHP foreach ($comprimido as $A) { ?>
                            <option value="<?= $A->getComprimidoId() ?>"><?= $A->getCapsula() ?></option>
						<?PHP } ?>
					</select>
				</div>
                <div class="col-md mb-3">
                <label for="ingredientes" class="form-label">Ingredientes</label>
                <textarea class="form-control" id="ingredientes" name="ingredientes" rows="7"></textarea>
            </div>

                <div class="col-md mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="7"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Agregar</button>
        </form>

    </div>
</div>