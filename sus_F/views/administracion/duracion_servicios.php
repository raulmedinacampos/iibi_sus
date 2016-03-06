<script src="js/duracion_servicios.js" type="text/javascript"></script>

<h4>Actualización de duración de servicios</h4>

<form method="post" id="formServicios" name="formServicios" class="form-horizontal col-sm-6" action="">
 <table class="table table-collapse table-striped">
  <tr>
   <th width="35%">Servicio</th>
   <th width="40%" class="text-center">Duración estimada</th></tr><?php
   
   foreach ($data as $servicio ) { ?> <tr>
    <td><?=$servicio['servicio']?></td>
	<td><div class="col-sm-offset-3 col-sm-6">
	    <input type="text" id="<?=$servicio['idTipoServicio']?>" name="<?=$servicio['idTipoServicio']?>" class="form-control input-sm" value="<?=$servicio['duracionEstimada']?>" />
	    </div></td></tr><?php } ?>
 </table>
 <div class="pull-right">
  <button id="btnActualizar" name="btnActualizar" class="btn btn-primary">Actualizar</button></div>
</form>