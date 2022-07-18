<h1 class="nombre__pag">Crear Cuenta</h1>
<p class="descripcion__pag">Llena el siguiente formulario para crear la cuenta</p>
<?php     include_once __DIR__ .'/../templates/alertas.php' ?>
<form action="/crearCuenta" method="POST" class="form">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
        type="text"
        id="nombre"
        name="nombre"
        placeholder="Ej. Juanito"
        value="<?php echo s($usuario->nombre) ?>"
        />
    </div>
    <div class="campo">
        <label for="apellido">Apellidos</label>
        <input 
        type="text"
        id="apellido"
        name="apellido"
        placeholder="Ej. Torombolord"
        value="<?php echo s($usuario->apellido) ?>"
        />
    </div>
    <div class="campo">
        <label for="tel">Teléfono</label>
        <input 
        type="tel"
        id="tel"
        name="telefono"
        placeholder="Ej. +52 5512349936"
        value="<?php echo s($usuario->telefono) ?>"
        />
    </div>
    <div class="campo">
        <label for="email">E-mail</label>
        <input 
        type="email"
        id="email"
        name="email"
        placeholder="Ej. correo@dominio.com"
        value="<?php echo s($usuario->email) ?>"
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
    <input type="submit" class="btn" value="Crear cuenta">
    <div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a>
    <a href="/forgot">¿Olvidaste la constraseña?</a>
</div>
</form>