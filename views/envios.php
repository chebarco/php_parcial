<div class="login-carrito">
    <h1 class="titulo-envio">¡Envíos gratis a todo el país!</h1>
    <h2 class="titulo-envio">¡Contactanos si tenes dudas!</h2>

    <div class="container">
        <form class="row g-3 form" action="obteniendo-datos.php" method="POST">
            <div class="col-12 mb-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-12 mb-6">
                <label for="clave" class="form-label">Email</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su email" required>
            </div>
            <div class="col-md mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="7"></textarea>
            </div>
            <button type="submit" class="btn btn-dark ingresar">Enviar</button>



        </form>
    </div>
</div>



<div class="row box">
    <div class="col-sm-12 col-md-6">
        <div class="pos_title">
            <div>
                <h3 class="titulo-h2">¡NO TE PIERDAS NADA!</h3>
            </div>
            <div class="desc_title">
                <p>Suscríbete a nuestra newsletter y obtén un 10% de descuento</p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div id="mc_embed_signup_scroll">
            <div class="mc-field-group envios-suscripcion">
                <input type="email" name="EMAIL" class="required email" id="EMAIL" placeholder="Tu dirección de email" aria-required="true">
                <button class="button-sus">Suscribirse</button>
            </div>
        </div>
    </div>
</div>