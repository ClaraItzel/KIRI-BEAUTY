<div class="barra">
    <p class="text-center">Bienvenido(a) <?php echo $nombre ?? '' ?></p>
    <a href="/logout" class="btn"> Cerrar sesión</a>
</div>
<?php if (isset($_SESSION['admin'])) :?>
    <div class="barra-servicios">
    <a href="/admin" class="btn">Ver citas</a>    
    <a href="/servicios" class="btn">Ver servicios</a>
    <a href="/servicios/crear" class="btn">Nuevo servicio</a>
    </div>
<?php endif;?>