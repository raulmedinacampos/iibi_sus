<script src="js/bootstrap3-typeahead.min.js" type="text/javascript"></script>
<script src="js/alta_usuario.js" type="text/javascript"></script>

<h3>Alta de usuarios del sistema</h3>
<p>Utilice este formulario para agregar nuevos usuarios al sistema de solicitud única de servicio considerando que, 
para ser usuario, es necesario que dicha persona esté registrada como trabajador de la dependencia.</p>

<form method="post" id="formUsuario" name="formUsuario" class="form-horizontal" action="">
	<div class="form-group">
		<div class="col-sm-6">
			<label>Escriba el nombre del trabajador que será dado de alta como usuario:</label>
			<input type="hidden" id="hdn_id" name="hdn_id" />
			<input type="text" id="trabajador" name="trabajador" class="form-control typeahead" />
		</div>
		<div class="col-sm-2">
			<label>&nbsp;</label>
			<button id="btnNuevoEmpleado" class="btn btn-info">Agregar nuevo empleado</button>
		</div>
	</div>
	
<!-- 	<div class="form-group">
		<div class="col-sm-4">
			<label>Usuario</label>
			<input type="text" id="usuario" name="usuario" class="form-control" />
		</div>
	</div>
-->	
 	<div class="form-group">
		<div class="col-sm-4">
			<label>Responsable de área en la que labora</label>
			<select id="autoriza" name="autoriza" class="form-control">
				<option value="">Seleccione</option>
				<option value="0">***El mismo usuario ***</option><?php
				while ( $row = mysqli_fetch_array($autoriza[1]) ) { ?>
				<option value="<?php echo $row['idEmpleado']; ?>"><?php echo $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']?></option>
				<?php }?>
			</select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-3">
			<label>Grupo</label>
			<select id="grupo" name="grupo" class="form-control">
				<option value="">Seleccione</option>
				<?php
				while ( $row = mysqli_fetch_array($grupo[1]) ) {
				?>
				<option value="<?php echo $row['idTipoUsuarioSUS']; ?>"><?php echo $row['tipoUsuarioSUS']?></option>
				<?php
				}
				?>
			</select>
		</div>
	</div>
	
	<p class="nota">El nombre de usuario y la contraseña se generarán automáticamente y se enviarán al correo institucional del usuario.</p>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar nuevo usuario</button>
		</div>
	</div>
</form>

<!-- Ventana modal para avisos -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>