<h1 class="nombre__pag">Servicios</h1>
<p class="descripcion__pag">Administracion de servicios</p>

<?php 
include_once __DIR__.'/../templates/barra.php';
?>
<ul class="servicios ">
 <?php foreach($servicios as $serv): ?>
    <li >
        <p>Servicio: <span><?php echo $serv->servicio ?></span></p>
        <p>Precio: <span>$<?php echo $serv->precio ?></span></p>
    </li>
    <div class="acciones">
        <a href="/servicios/actualizar?id=<?php echo $serv->id ?>" class="btn bg-azul">Actualizar</a>
        <form action="/servicios/eliminar" method="POST">
            <input type="hidden" name="id" value="<?php echo $serv->id ?>" class="btn">
            <input type="submit" value="Borrar" class="btn-eliminar">
        </form>
    </div>
 <?php endforeach; ?>
</ul>
