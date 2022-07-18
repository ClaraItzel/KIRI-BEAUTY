<h1 class="nombre__pag">Crear cita</h1>
<p class="descripcion__pag">Elige entre la gran variedad de servicios, continuación ayúdanos con tus datos</p>
<?php include_once __DIR__.'/../templates/barra.php' ?>
<div id="app">
    <nav class="tabs">
        <button type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Citas</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elíge entre la enorme variedad</p>
        <div id="servicios" class="listados-servicios">

        </div>
    </div>
    <div id="paso-2" class="seccion">
    <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca tus datos y fecha de cita</p>
        <form class="form">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text"
                        id="nombre"
                        placeholder="Ej. Pancho"
                        value="<?php echo $nombre; ?>"
                        disabled
                        />
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date"
                        id="fecha"
                        min=<?php echo date('Y-m-d',strtotime('+1 day'))?>
                        />
            </div>
            <div class="campo">
                <label for="hora">Hora</label>
                <input type="time"
                        id="hora"
                        />
            </div>
            <input type="hidden" name="iduser" id="iduser" value="<?php echo $id; ?>">
        </form>

    </div>
    <div id="paso-3" class="seccion">
    <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
        <div class="contenido-resumen"></div>
    </div>

    <div class="paginacion">
        <button
            id="anterior"
            class="btn"> &laquo; Anterior</button>

        <button
            id="siguiente"
            class="btn">  Siguiente&raquo;</button>
    </div>
</div>

<?php 
$script = "
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script src='build/js/app.js'></script>";
?>