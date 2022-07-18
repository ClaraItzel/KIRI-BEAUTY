<?php 
foreach($alertas as $key => $alerts):
    foreach ($alerts as $alert ) {
        ?> 
        <div class="alerta <?php echo $key?>">
        <?php echo $alert; ?>
    </div>
  <?php  }
endforeach;
?>