<script src="js/duracion_servicios.js" type="text/javascript"></script>

<h4>Actualización de duración de servicios</h4>

<form method="post" id="formServicios" name="formServicios" class="form-horizontal col-sm-6" action="">
	<table class="table table-collapse table-striped">
		<tr>
			<th width="25%">Servicio</th>
			<th width="40%" class="text-center">Duración estimada</th>
			<th width="35%" class="text-center">Actualizar</th>
		</tr>
		<tr>
			<td>Vigilancia</td>
			<td>
				<div class="col-sm-offset-3 col-sm-6">
					<input type="text" id="vigilancia" name="vigilancia" class="form-control input-sm" value="" />
				</div>
			</td>
			<td class="text-center"><input type="checkbox" id="chkVigilancia" name="chkVigilancia" value="1" /></td>
		</tr>
		<tr>
			<td>Limpieza</td>
			<td>
				<div class="col-sm-offset-3 col-sm-6">
					<input type="text" id="limpieza" name="limpieza" class="form-control input-sm" value="" />
				</div>
			</td>
			<td class="text-center"><input type="checkbox" id="chkLimpieza" name="chkLimpieza" value="1" /></td>
		</tr>
		<tr>
			<td>Mensajería</td>
			<td>
				<div class="col-sm-offset-3 col-sm-6">
					<input type="text" id="mensajeria" name="mensajeria" class="form-control input-sm" value="" />
				</div>
			</td>
			<td class="text-center"><input type="checkbox" id="chkMensajeria" name="chkMensajeria" value="1" /></td>
		</tr>
	</table>
	
	<div class="pull-right">
		<button id="btnActualizar" name="btnActualizar" class="btn btn-primary">Actualizar</button>
	</div>
</form>