<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />

<script src="js/reporte.js" type="text/javascript"></script>

<h4>Seleccione el mes y año para obtener el reporte</h4>

<form method="post" id="formReporte" name="formReporte" class="form-horizontal" action="reportes/estadisticas-de-cancelacion-pdf" target="_blank">
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
		
		<div class="col-sm-4">
			<button id="btnConsultar" class="btn btn-info">Consultar reporte</button>
		</div>
	</div>
</form>