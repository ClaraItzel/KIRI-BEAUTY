<h1 class="nombre__pag">Servicios</h1>
<p class="descripcion__pag">Modifica los valores del formulario</p>

<?php 
include_once __DIR__.'/../templates/barra.php';
include_once __DIR__.'/../templates/alertas.php';
?>
<form method="POST">
    <?php include_once __DIR__.'/formulario.php'; ?>
    <input type="submit" value="Actualizar servicio" class="btn">
</form>