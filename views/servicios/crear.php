<h1 class="nombre__pag">Nuevo Servicio</h1>
<p class="descripcion__pag">LLlena los campos para añadir servicio</p>

<?php 
include_once __DIR__.'/../templates/barra.php';
include_once __DIR__.'/../templates/alertas.php';
?>
<form action="/servicios/crear" method="POST">
    <?php include_once __DIR__.'/formulario.php'; ?>
    <input type="submit" value="Guardar servicio" class="btn">
</form>