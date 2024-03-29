<h1 class="nombre__pag">Panel de administración</h1>
<?php include_once __DIR__.'/../templates/barra.php' ?>

<div class="busqueda">
    <h2>Buscar citas</h2>
    <form class="form">
        <div class="campo">
            <label for="fecha">Fecha</label>
        <input type="date"
                id="fecha"
                name="fecha"  
                value="<?php echo $fecha ?>"      
        />
        </div>
        
    </form>
</div>
<?php if (count($citas)===0) { ?>
    <h2>No hay citas en esta fecha</h2>
    <div class="contenido_img"></div>
    <?php } ?>
<div class="citas-admin">
    <ul class="citas">
    <?php 
    $idCita=null;
    foreach($citas as $key=> $cita ):

        if ($idCita!== $cita->id) :
            $total=0;
            
    ?>
    <li>
        <p>ID: <span><?php echo $cita->id; ?></span></p>
        <p>HORA: <span><?php echo $cita->hora; ?></span></p>
        <p>CLIENTE: <span><?php echo $cita->cliente; ?></span></p>
        <p>EMAIL: <span><?php echo $cita->email; ?></span></p>
        <p>TELÉFONO: <span><?php echo $cita->telefono; ?></span></p>
            <h3>Servicios</h3>

    </li>
   

    <?php  
    endif; ?>
    
    <p class="servicio"><?php echo $cita->servicio." <span> $".$cita->precio; ?> </span></p>
    
    
   <?php    
            $total+= $cita->precio;
            $idCita= $cita->id; 
            $actual=$cita->id;
            $proximo= $citas[$key+1]->id ?? 0;
            if (esUltimo($actual,$proximo)) {?>
               <p class="total">Total: <span><?php echo "$".$total.'.00'; ?></span></p>
               <form action="/api/eliminar" method="POST">
                    <input type="hidden" name="idCita" value="<?php echo $cita->id ?>">
                    <input type="submit" value="Eliminar" class="btn-eliminar">
               </form>
                <?php    }
        endforeach;
            
    ?>
        
     
    </ul>
   
</div>

<?php
$script= '<script src="build/js/buscador.js"></script>';
?>