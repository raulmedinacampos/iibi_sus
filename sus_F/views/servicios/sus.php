<script type="text/javascript" src="js/formato_solicitud.js"></script>

<form method="post" id="formSolicitud" name="formSolicitud" class="form-horizontal" action="">
	<div class="form-group">
		<label class="col-sm-2 control-label">Área solicitante</label>
		<div class="col-sm-4">
			<input id="area_solicitante" name="area_solicitante" class="form-control" readonly="readonly" value="<?php echo (($area) ? $area['area'] : ""); ?>" />
		</div>
		
		<label class="col-sm-2 control-label">Responsable del área solicitante</label>
		<div class="col-sm-4">
			<input id="responsable" name="responsable" class="form-control" readonly="readonly" value="<?=$nomResponsable?>" />
		</div>
	</div> <!-- Fin .form-group -->
	
	<div class="form-group">
		<label class="col-sm-2 control-label obligatorio">Nombre del usuario</label>
		<div class="col-sm-4">
			<select id="nomSol" name="nomSol" class="form-control">
				<option value="">Seleccione</option><?php
					while ( $row = mysqli_fetch_array($nomUsuario[1]) ) {?>
						<option value="<?php echo $row['idNomUsuario']; ?>"><?php echo $row['nombreUsuario']; ?></option><?php } ?>
			</select>
		</div>
		
		<label class="col-sm-1 control-label">Fecha solicitud</label>
		<div class="col-sm-2">
			<input id="responsable" name="responsable" class="form-control" readonly="readonly" value="<?php echo date('d/m/Y'); ?>" />
		</div>
		
		<label class="col-sm-1 control-label">Teléfono</label>
		<div class="col-sm-2">
			<input id="responsable" name="responsable" class="form-control" readonly="readonly" value="<?php echo (($empleado) ? $empleado['telOficina'] : ""); ?>" />
		</div>
	</div> <!-- Fin .form-group -->
	
	<h4>Tipo de servicio:</h4>
	<div class="nota">
		<p>Nota: Es necesario elaborar una solicitud por cada servicio requerido.</p>
	</div>
	
	<?php if($_SESSION['tipoUsuario']==8)
		echo '<div class="nota"><p>Si requiere otro servicio favor de solicitarlo en la Secretaría Académica.</p></div>';
	?>
	
	<div class="row row-eq-height">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Diversos</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb" name="servicio" value="11" />Limpieza</label>
					</div>
					
					
					<div class="radio">
						<label><input type="radio" id="rdb_diversos_otro" name="servicio" value="13" 
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?>
						 />Otro</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Mensajería</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_21" name="servicio" value="21"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?>/>Mensajería</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_22" name="servicio" value="22"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Paquetería</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_mensajeria_otro" name="servicio" value="23"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Otro</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Reproducción y engargolado</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_41" name="servicio" value="41"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Fotocopiado</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_42" name="servicio" value="42"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Engargolado</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_43" name="servicio" value="43"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Enmicado</label>
					</div>
				</div>
			</div>
		</div>	
			
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Vigilancia para eventos especiales</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_7" name="servicio" value="71"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Vigilancia</label>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin .row -->
	
	<div class="row row-eq-height">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Mantenimiento a equipo y vehículos</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_31" name="servicio" value="31"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Mecánica</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_32" name="servicio" value="32"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Aire acondicionado</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_33" name="servicio" value="33"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Equipo de cómputo</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_34" name="servicio" value="34"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Reparación de equipo</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_35" name="servicio" value="35"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Mantenimiento a mobiliario</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_mto_otro" name="servicio" value="36"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Otro</label>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Servicio a inmueble</div>
				<div class="panel-body">
					<div class="col-sm-6">
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="61"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Albañilería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="62"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Carpintería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="63"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Herrerería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="64"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Cerrajería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="68"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Fumigación</label>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="65"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Electricidad</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="66"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Plomería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="67"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Pintura</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb_servicio_otro" name="servicio" value="69"
							<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Otro</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Transporte</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_51" name="servicio" value="53"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Local</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_52" name="servicio" value="52"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Foráneo</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_53" name="servicio" value="51"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Pasajeros</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_54" name="servicio" value="54"
						<?php echo ($_SESSION['tipoUsuario']==8) ? "disabled":"";?> />Carga</label>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin .row -->
	
	<div id="instrucciones"></div>
	
	<label class="obligatorio">Escribir la descripción del servicio, los días, horario y lugar dónde se requerirá</label>
	<textarea id="descripcion" name="descripcion" rows="3" class="form-control"></textarea>
	<br />
	
	<div class="row">
		<div class="col-sm-12 text-right">
			<button id="btnCancelar" name="btnCancelar" class="btn btn-default" onclick="window.location = 'principal' ">Cancelar</button>
			<button id="btn_enviar" name="btn_enviar" class="btn btn-primary">Solicitar servicio</button>
		</div>
	</div> <!-- Fin .row -->
</form>

<form method="post" id="formPDF" name="formPDF" class="form-horizontal" action="sus-pdf" target="_blank">
	<input type="hidden" id="hNuevaSolicitud" name="hNuevaSolicitud" value="">
</form>