<h1 class="nombre__pag"> Login </h1>
<?php     include_once __DIR__ .'/../templates/alertas.php' ?>
<p class="descripcion__pag">Inicia sesión con tus datos</p>
<form class="form" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            placeholder="Ej. corre@dominio.com"
            name="email"
        />
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="Ej. patito29"
            name="password"
        />
    </div>
    <input type="submit" value="Iniciar sesión" class="btn">
</form>
<div class="acciones">
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Crea una</a>
    <a href="/forgot">¿Olvidaste la constraseña?</a>
</div>