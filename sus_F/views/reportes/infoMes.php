<script src="js/informe_mensual.js" type="text/javascript"></script>

<h2>Informe Mensual de Servicios</h2>
<form action="" id="formInforme" name="formInforme" class="form-horizontal" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label class="col-sm-1 control-label">Mes</label>
		<div class="col-sm-3">
			<select id="mes" name="mes" class="form-control">
				<option value="">Seleccione</option>
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
		</div>
		
		<label class="col-sm-1 control-label">Año</label>
		<div class="col-sm-3">
			<select id="anio" name="anio" class="form-control">
				<option value="">Seleccione</option>
				<?php
					for ($i=2016; $i<=date('Y'); $i++) {
				?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>
	
	<table class="table table-condensed table-striped">
		<tr>
			<th>Línea</th>
			<th>Tipo de servicio</th>
			<th class="text-center">No. servicios solicitados</th>
			<th class="text-center">No. servicios realizados</th>
			<th>Resumen / detalle o notas de apoyo</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Correspondencia</td>
			<td class="text-center">19
				<input type="hidden" name="hCorrespS" value="19" id="hCorrespS" />
			</td>
			<td class="text-center">19
				<input type="hidden" name="hCorrespR" value="19" id="hCorrespR" />
			</td>
			<td><input type="text" name="obsCorresp" value="" id="obsCorresp" class="form-control" /></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Fotocopiado</td>
			<td class="text-center">4
				<input type="hidden" name="hFotocS" value="" id="hCorrespS" />
			</td>
			<td class="text-center">4
				<input type="hidden" name="hFotocR" value="" id="hCorrespR" />
			</td>
			<td><input type="text" name="obsFotoc" value="" id="obsFotoc" class="form-control" /></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Engargolado</td>
			<td class="text-center">1
				<input type="hidden" name="hEngarS" value="" id="hEngarS" />
			</td>
			<td class="text-center">1
				<input type="hidden" name="hEngarR" value="" id="hEngarR" />
			</td>
			<td><input type="text" name="obsEngar" value="" id="obsEngar" class="form-control" /></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Mantenimiento a equipo</td>
			<td class="text-center">5
				<input type="hidden" name="hMtoEqS" value="" id="hMtoEqS" />
			</td>
			<td class="text-center">5
				<input type="hidden" name="hMtoEqR" value="" id="hMtoEqR" />
			</td>
			<td><input type="text" name="obsMtoEq" value="" id="obsMtoEq" class="form-control" /></td>
		</tr>
		<tr>
			<td>5</td>
			<td>Mantenimiento a inmueble</td>
			<td class="text-center">1
				<input type="hidden" name="hMtoInmS" value="" id="hMtoInmS" />
			</td>
			<td class="text-center">1
				<input type="hidden" name="hMtoInmR" value="" id="hMtoInmR" />
			</td>
			<td><input type="text" name="obsMtoInm" value="" id="obsMtoInm" class="form-control" /></td>
		</tr>
		<tr>
			<td>6</td>
			<td>Mantenimiento a vehículos</td>
			<td class="text-center">2
				<input type="hidden" name="hMtoVehS" value="" id="hMtoVehS" />
			</td>
			<td class="text-center">2
				<input type="hidden" name="hMtoVehR" value="" id="hMtoVehR" />
			</td>
			<td><input type="text" name="obsMtoVeh" value="" id="obsMtoVeh" class="form-control" />
	</td>
		</tr>
		<tr>
			<td>7</td>
			<td>Transporte</td>
			<td class="text-center">2
				<input type="hidden" name="hTranspS" value="" id="hTranspS" />
			</td>
			<td class="text-center">2
				<input type="hidden" name="hTranspR" value="" id="hTranspR" />
			</td>
			<td><input type="text" name="obsTransp" value="" id="obsTransp" class="form-control" /></td>
		</tr>
		<tr>
			<td>8</td>
			<td>Limpieza</td>
			<td class="text-center">2
				<input type="hidden" name="hLimpS" value="" id="hLimpS" />
			</td>
			<td class="text-center">2
				<input type="hidden" name="hLimpR" value="" id="hLimpR" />
			</td>
			<td><input type="text" name="obsLimp" value="" id="obsLimp" class="form-control" /></td>
		</tr>
		<tr>
			<td>9</td>
			<td>Seguridad</td>
			<td class="text-center">0
				<input type="hidden" name="hSegS" value="" id="hSegS" />
			</td>
			<td class="text-center">0
				<input type="hidden" name="hSegR" value="" id="hSegR" />
			</td>
			<td><input type="text" name="obsSeg" value="" id="obsSeg" class="form-control" /></td>
		</tr>
	</table>
	
	<table class="table table-condensed table-striped">
		<tr>
			<th>Información</th>
			<th class="text-center">Totales p/indicadores</th>
			<th>Observaciones</th>
		</tr>
		<tr>
			<td>Servicios realizados</td>
			<td class="text-center">36
				<input type="hidden" name="hTotalR" value="" id="hTotalR" />
			</td>
			<td><input type="text" name="obsTotalR" value="" id="obsTotalR" class="form-control" /></td>
		</tr>
		<tr>
			<td>Servicios solicitados</td>
			<td class="text-center">36
				<input type="hidden" name="hTotalS" value="" id="hTotalS" />
			</td>
			<td><input type="text" name="obsTotalS" value="" id="obsTotalS" class="form-control" /></td>
		</tr>
		<tr>
			<td>Servicios programados realizados<br />(Mantenimiento, seguridad y limpieza)</td>
			<td><input type="text" name="numSerProgR" value="" id="numSerProgR" class="form-control" /></td>
			<td><input type="text" name="obsSerProgR" value="" id="obsSerProgR" class="form-control" /></td>
		</tr>
		<tr>
			<td>Servicios programados no realizados<br />(Mantenimiento, seguridad y limpieza)</td>
			<td><input type="text" name="numSerProgNR" value="" id="numSerProgNR" class="form-control" /></td>
			<td><input type="text" name="obsSerProgNR" value="" id="obsSerProgNR" class="form-control" /></td>
		</tr>
	</table>
	
	<table class="table table-condensed table-striped">
		<tr>
			<th>Información</th>
			<th>Control de bienes</th>
			<th>Observaciones</th>
		</tr>
		<tr>
			<td>Entrada de bienes de activo fijo</td>
			<td><input type="text" name="entradaBienes" value="" id="entradaBienes" class="form-control" /></td>
			<td><input type="text" name="obsEntradaB" value="" id="obsEntradaB" class="form-control" /></td>
		</tr>
		<tr>
			<td>Salida de bienes de activo fijo</td>
			<td><input type="text" name="salidaBienes" value="" id="salidaBienes" class="form-control" /></td>
			<td><input type="text" name="obsSalidaB" value="" id="obsSalidaB" class="form-control" /></td>
		</tr>
	</table>
	
	<label>Observaciones:</label>
	<textarea name="obsGrales" cols="40" rows="3" id="obsGrales" class="form-control" ></textarea>
	<br />
	<div class="row">
		<div class="text-center col-sm-4">
			<p><strong>Elaboró</strong></p>
			<p>&nbsp;</p>
			<p>Alejandra Olvera Ortíz<br />
			<em>Responsable Servicios Generales</em></p>
		</div>
		<div class="text-center col-sm-offset-4 col-sm-4">
			<p><strong>Enterado</strong></p>
			<p>&nbsp;</p>
			<p>Lic. Amanda G. González Robles Sánchez<br />
			<em>Secretario o Jefe de Unidad Administrativa</em></p>
		</div>
	</div>
	
	<div class="text-center">
		<button name="btnEnviar" type="button" id="btnEnviar" class="btn btn-primary">Enviar</button>
	</div>
</form>