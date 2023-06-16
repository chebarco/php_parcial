<div class="login">
  <div class="container">
  <form class="row g-3 form" action="actions/auth_login.php" method="POST">
  <h1>Ingreso Usuario</h1>
    <div class="col-12 mb-6">
      <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
      <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario">
    </div>
    <div class="col-12 mb-6">
      <label for="clave" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="clave" name="clave">
    </div>
    <div>
			<?= (new Notificaciones())->get_alertas(); ?>
		</div> 

    <button type="submit" class="btn btn-dark">Ingresar</button>
  </form>
</div>
</div>
