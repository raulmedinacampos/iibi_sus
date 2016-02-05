<h4>Para ser usuario del sistema es necesario que la persona esté registrada como trabajador de la dependencia</h4>


<form method="post" id="formUsuario" name="formUsuario" class="form-horizontal" action="">
	<div class="form-group">
		<div class="col-sm-6">
			<label>Escriba el nombre del trabajador que será dado de alta como usuario:</label>
			<input type="hidden" id="hdn_id" name="hdn_id" />
			<input type="text" id="trabajador" name="trabajador" class="form-control typeahead" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-3">
			<label>Usuario</label>
			<input type="text" id="usuario" name="usuario" class="form-control" />
		</div>
	</div>
		
	<div class="form-group">
		<div class="col-sm-3">
			<label>Grupo</label>
			<select id="grupo" name="grupo" class="form-control">
				<option value="">Seleccione</option>
			</select>
		</div>
	</div>
	
	<p class="nota">La contraseña se generará automáticamente y se enviará al correo institucional del usuario junto con su nombre de usuario.</p>
	
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