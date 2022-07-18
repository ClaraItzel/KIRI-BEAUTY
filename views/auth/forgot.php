<h1 class="nombre__pag">Olvidé mi password</h1>
<p class="descripcion__pag">Restablece tu contraseña, indícanos tu email a continuación</p>
<?php     include_once __DIR__ .'/../templates/alertas.php' ?>
<form action="/forgot" class="form" method="POST">
<div class="campo">
        <label for="email">E-mail</label>
        <input 
        type="email"
        id="email"
        name="email"
        placeholder="Ej. correo@dominio.com"
        />
    </div>
    <input type="submit" class="btn" value="Enviar">
    <div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a> 
    <a href="/crearCuenta">¿No tienes cuenta aún? Crea una</a>
    </div>
</form>