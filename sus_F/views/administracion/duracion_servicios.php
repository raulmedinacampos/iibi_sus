<script src="js/duracion_servicios.js" type="text/javascript"></script>

<h3>Actualización de duración de servicios</h3>
<p>A continuación se muestran la duración máxima en días que se requiere para llevar a cabo un servicio.
Para modifcarlas, es necesario cambiar el valor dentro de la casilla correspondiente y dar click en el botón "Actualizar" 
situado en la parte inferior de esta página.</p> 

<form method="post" id="formServicios" name="formServicios" class="form-horizontal col-sm-6" action="">
 <table class="table table-collapse table-striped">
  <tr>
   <th width="35%">Servicio</th>
   <th width="40%" class="text-center">Duración estimada</th></tr><?php
   
   while ( $row = mysqli_fetch_array($servicio[1]) ) { ?> <tr>
    <td><?php echo $row['servicio']?></td>
	<td><div class="col-sm-offset-3 col-sm-6">
	    <input type="text" id="<?php echo $row['idTipoServicio']?>" name="<?php echo $row['idTipoServicio']?>" class="form-control input-sm" value="<?php echo $row['duracionEstimada']?>" />
	    </div></td></tr><?php } ?>
 </table>
 <div class="pull-right">
  <button id="btnActualizar" name="btnActualizar" class="btn btn-primary">Actualizar</button></div>
</form>