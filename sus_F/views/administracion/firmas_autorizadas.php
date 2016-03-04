<script src="js/firmas_autorizadas.js" type="text/javascript"></script>

<h4>Actualización de firmas autorizadas, Secretaría Administrativa</h4>

<form method="post" id="formFirmas" name="formFirmas" class="form-horizontal col-sm-8" action="">
	<div class="row">
		<h5 class="text-primary"><strong>Secretario Administrativo</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualAdministrativo" name="actualAdministrativo" class="form-control" readonly="readonly" value="Aquí va el nombre que se jala desde la base" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="administrativo" name="administrativo" class="form-control" />
			</div>
			<div class="col-sm-2">
				<button id="btnAdministrativo" name="btnAdministrativo" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>
	
	<div class="row">
		<h5 class="text-primary"><strong>Jefe de Área de Servicios Generales</strong></h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Actual:</label>
			<div class="col-sm-8">
				<input type="text" id="actualServiciosGenerales" name="actualServiciosGenerales" class="form-control" readonly="readonly" value="Aquí va el nombre que se jala desde la base" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nuevo:</label>
			<div class="col-sm-8">
				<input type="text" id="serviciosGenerales" name="serviciosGenerales" class="form-control" />
			</div>
			<div class="col-sm-2">
				<button id="btnServiciosGenerales" name="btnServiciosGenerales" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>
	
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
</form>