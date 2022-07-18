<h1 class="nombre__pag"> Recuperar Password </h1>
<p class="descripcion__pag">Ingresa el nuevo password a continuación</p>
<?php     include_once __DIR__ .'/../templates/alertas.php' ?>
<?php if($error) return?>
<form method="POST" class="form">

    <div class="campo">
        <label for="psw">Password</label>
        <input type="password"
                id="password"
                name="password"
                placeholder="Ingresa tu nuevo password">
    </div>
    <input type="submit" class="btn" value="Actualizar Password" >
    <div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a> 
    <a href="/crearCuenta">¿No tienes cuenta aún? Crea una</a>
    </div>
</form>