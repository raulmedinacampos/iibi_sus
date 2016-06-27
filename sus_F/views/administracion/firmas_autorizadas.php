<script src="js/bootstrap3-typeahead.min.js" type="text/javascript"></script>
<script src="js/firmas_autorizadas.js" type="text/javascript"></script>

<h4>Secretaría Administrativa</h4>
<p>Mediante este formulario podrá cambiar los nombres de las personas que aperecen en el formato de Solicitud Única de Servicios.
Considere que, para hacerlo, es necesario que la persona se encuentre dada de alta en la base de datos del sistema, y que
al dar click en <i>Actualizar</i>, estará dando de baja a la persona anterior en su cargo.</p>
<form method="post" id="formFirmas" name="formFirmas" class="form-horizontal col-sm-8" action="" autocomplete="off">
	<div class="row">
		<h5 class="text-primary"><strong>Secretario Administrativo</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualAdministrativo" name="actualAdministrativo" class="form-control" readonly="readonly" value="<?php echo $secretario['gradoAcad']." ".$secretario['nombre']." ".$secretario['apellidoP']." ".$secretario['apellidoM'] ?>"/>
				<input type="hidden" id="id_strio_ant" name="id_strio_ant" value="<?php echo $secretario['idPuesto']?>" /></div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="administrativo" name="administrativo" class="form-control typeahead" />
				<input type="hidden" id="hdn_id_strio" name="hdn_id_strio" />
			</div>
			<div class="col-sm-2">
				<button id="btnAdministrativo" name="btnAdministrativo" class="btn btn-primary">Actualizar</button>
				
			</div>
		</div>
	</div>
	
	<div class="row">
		<h5 class="text-primary"><strong>Resposable de las solicitudes de servicios</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualServiciosGenerales" name="actualServiciosGenerales" class="form-control" readonly="readonly" value="<?php echo $sGenerales['gradoAcad']." ".$sGenerales['nombre']." ".$sGenerales['apellidoP']." ".$sGenerales['apellidoM'] ?>" />
				<input type="hidden" id="id_sg_ant" name="id_sg_ant" value="<?php echo $sGenerales['idPuesto']?>" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="serviciosGenerales" name="serviciosGenerales" class="form-control typeahead" />
				<input type="hidden" id="hdn_id_sg" name="hdn_id_sg" />								
			</div>
			<div class="col-sm-2">
				<button id="btnServiciosGenerales" name="btnServiciosGenerales" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>

<!-- 	
	<div class="row">
		<h5 class="text-primary"><strong>Jefe de Departamento de Personal</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualPersonal" name="actualPersonal" class="form-control" readonly="readonly" value="Aquí va el nombre que se jala desde la base" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="personal" name="personal" class="form-control" />
			</div>
			<div class="col-sm-2">
				<button id="btnPersonal" name="btnPersonal" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>
	
	<div class="row">
		<h5 class="text-primary"><strong>Jefe de Departamento de Presupuesto</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualPresupuesto" name="actualPresupuesto" class="form-control" readonly="readonly" value="Aquí va el nombre que se jala desde la base" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="presupuesto" name="presupuesto" class="form-control" />
			</div>
			<div class="col-sm-2">
				<button id="btnPresupuesto" name="btnPresupuesto" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>

	<div class="row">
		<h5 class="text-primary"><strong>Jefe de Departamento de Bienes y suministros</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualBienes" name="actualBienes" class="form-control" readonly="readonly" value="Aquí va el nombre que se jala desde la base" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="bienes" name="bienes" class="form-control" />
			</div>
			<div class="col-sm-2">
				<button id="btnBienes" name="btnBienes" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>
 -->
</form>