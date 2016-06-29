	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />

<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="js/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
<script src="js/edicion_empleado.js" type="text/javascript"></script>

<h4>Escriba o modifique los datos del empleado</h4>

<form method="post" id="formEmpleado" name="formEmpleado" class="form-horizontal" action="" enctype="multipart/form-data" >
	<div class="panel panel-primary">
		<div class="panel-heading">Datos personales</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-2 control-label datos-adicionales">Grado</label>
				<div class="col-sm-4 datos-adicionales">
					<input type="hidden" id="hdnId" name="hdnId" value="<?php echo $empleado['idEmpleado']; ?>" />
					<select id="grado" name="grado" class="form-control">
						<option value="">Seleccione</option>
						<?php
						while ( $row = mysqli_fetch_array($grado[1]) ) {
						?>
							<option value="<?php echo $row['grado']; ?>" <?php if($empleado['gradoAcad'] == $row['grado']){echo 'selected="selected"';} ?>><?php echo $row['grado']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				
				<label class="col-sm-2 control-label">Nombre(s)</label>
				<div class="col-sm-4">
					<input id="nombre" name="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>" readonly="readonly" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Apellido paterno</label>
				<div class="col-sm-4">
					<input id="apPaterno" name="apPaterno" class="form-control" value="<?php echo $empleado['apellidoP']; ?>" readonly="readonly" />
				</div>
				
				<label class="col-sm-2 control-label">Apellido materno</label>
				<div class="col-sm-4">
					<input id="apMaterno" name="apMaterno" class="form-control" value="<?php echo $empleado['apellidoM']; ?>" readonly="readonly" />
				</div>
			</div>
			

		</div>
	</div>
	
	<div class="panel panel-primary datos-adicionales">
		<div class="panel-heading">Datos laborales</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Área IIBI</label>
				<div class="col-sm-4">
					<select id="area" name="area" class="form-control">
						<option value="">Seleccione</option>
						<?php
						while ( $row = mysqli_fetch_array($area[1]) ) {
						?>
							<option value="<?php echo $row['idArea']; ?>"<?php if($empleado ['idArea']    == $row['idArea']){echo 'selected="selected"';} ?>><?php echo $row['area'];  ?></option>
						<?php
						}
						?>
					</select>
				</div>
				
				<label class="col-sm-2 control-label">Puesto</label>
				<div class="col-sm-4">
					<select id="puesto" name="puesto" class="form-control">
						<option value="">Seleccione</option>
						<?php
						while ( $row = mysqli_fetch_array($puesto[1]) ) {
						?>
							<option value="<?php echo $row['nombre']; ?>"<?php if($empleado ['puesto']  == $row['nombre']){echo 'selected="selected"';} ?>><?php echo $row['nombre'];  ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Teléfono oficina</label>
				<div class="col-sm-4">
					<input id="telefonoOf" name="telefonoOf" class="form-control" value="<?php echo $empleado['telOficina']; ?>" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Correo institucional</label>
				<div class="col-sm-4">
					<input id="correoInst" name="correoInst" class="form-control" value="<?php echo $empleado['eMailOf']; ?>" />
				</div>
				
				<label class="col-sm-2 control-label">Confirmar correo</label>
				<div class="col-sm-4">
					<input id="correoInstConf" name="correoInstConf" class="form-control" value="<?php echo $empleado['eMailOf']; ?>" />
				</div>
			</div>


<!--
 			<div class="form-group">
				<label class="col-sm-2 control-label">Rubrica</label>
				<div class="col-sm-4">
					<input id="rubrica" name="rubrica" class="form-control" value="<?php //echo $empleado['rubrica']; ?>" />
				</div>
				
				<label class="col-sm-2 control-label">Cambiar rubrica</label>
				<div class="col-sm-4">
					<input type="file" id="rubrica" name="rubrica" class="form-control"/>
				</div>
			</div>
 -->

		</div>
	</div>
	
	<div class="form-group text-right datos-adicionales">
		<div class="col-sm-12">
			<button id="btnCancelar" name="btnCancelar" class="btn btn-default" onclick="window.location = 'principal'">Cancelar</button>
			<button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Actualizar</button>
		</div>
	</div>
</form>

<!-- Ventana modal para avisos -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Aceptar</button>
        <button type="button"class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>