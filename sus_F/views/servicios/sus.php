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
			<input id="nomSol" name="nomSol" class="form-control" value="<?=$nomUsuario?>" />
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
	<p class="nota">Nota: Es necesario elaborar una solcitud por cada servicio requerido</p>
	
	<div class="row row-eq-height">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Diversos</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb" name="servicio" value="11" />Limpieza</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb" name="servicio" value="12" />Servicio de bocadillos</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_diversos_otro" name="servicio" value="13" />Otro</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Mensajería</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_21" name="servicio" value="21" />Con propio</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_22" name="servicio" value="22" />Correo ordinario</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_23" name="servicio" value="23" />Mensajería especializada</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Reproducción y engargolado</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_41" name="servicio" value="41" />Fotocopiado</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_42" name="servicio" value="42" />Engargolado</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_43" name="servicio" value="43" />Enmicado</label>
					</div>
				</div>
			</div>
		</div>	
			
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Vigilancia para eventos especiales</div>
				<div class="panel-body">
					<div class="radio">
						<label><input type="radio" id="rdb_7" name="servicio" value="71" />Vigilancia</label>
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
						<label><input type="radio" id="rdb_7" name="servicio" value="31" />Mecánica</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_32" name="servicio" value="32" />Aire acondicionado</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_33" name="servicio" value="33" />Equipo de cómputo</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_34" name="servicio" value="34" />Reparación de equipo</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_35" name="servicio" value="35" />Mantenimiento a mobiliario</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_36" name="servicio" value="36" />Otro</label>
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
							<label><input type="radio" id="rdb" name="servicio" value="61" />Albañilería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="62" />Carpintería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="63" />Herrerería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="64" />Cerrajería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="68" />Fumigación</label>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="65" />Electricidad</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="66" />Plomería</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="67" />Pintura</label>
						</div>
						
						<div class="radio">
							<label><input type="radio" id="rdb" name="servicio" value="69" />Otro</label>
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
						<label><input type="radio" id="rdb_51" name="servicio" value="53" />Local</label>
					</div>
		
					<div class="radio">
						<label><input type="radio" id="rdb_52" name="servicio" value="52" />Foráneo</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_53" name="servicio" value="51" />Pasajeros</label>
					</div>
					
					<div class="radio">
						<label><input type="radio" id="rdb_54" name="servicio" value="54" />Carga</label>
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
			<button id="btn_enviar" name="btn_enviar" class="btn btn-primary">Solicitar servicio</button>
		</div>
	</div> <!-- Fin .row -->
</form>