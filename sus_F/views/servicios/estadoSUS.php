<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />
<link href="css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="js/jquery.fileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="js/estado_solicitud.js"></script>

<h3>Estado de solicitudes</h3>
<p>Inicialmente, se muestran las últimas 15 solicitudes realizadas<?php //setlocale(LC_TIME, "es_MX"); echo strftime("%B");?>. Si desea conocer el estado de otras solicitudes por favor use los filtros siguientes:</p>

<div class="panel panel-primary">
	<div class="panel-heading">Filtros de búsqueda</div>
	<div class="panel-body">
		<form method="post" id="formFiltro" name="formFiltro" class="form-horizontal" action="">
			<div class="form-group">
				<label class="col-sm-2 control-label">Fecha inicial</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input id="fechaInicial" name="fechaInicial" class="form-control datepicker" />
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
				
				<label class="col-sm-2 control-label">Fecha final</label>
				<div class="col-sm-4">
					<div class="input-group">
						<input id="fechaFinal" name="fechaFinal" class="form-control datepicker" />
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo de servicio</label>
				<div class="col-sm-4">
					<select id="tipoServicio" name="tipoServicio" class="form-control">
						<option value="">Seleccione</option>
						<?php
						while ( $row = mysqli_fetch_array($servicios[1]) ) {
						?>
						<option value="<?php echo $row['idTipoServicio']; ?>"><?php echo $row['servicio']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				
				<label class="col-sm-2 control-label">Estado</label>
				<div class="col-sm-4">
					<select id="estado" name="estado" class="form-control">
						<option value="">Seleccione</option>
						<?php
						while ( $row = mysqli_fetch_array($estados[1]) ) {
						?>
						<option value="<?php echo $row['idEstatusSUS']; ?>"><?php echo $row['estatus']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-12">
					<div class="pull-right">
						<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<table id="resultados" class="table table-condensed table-striped">
</table>

<form method="post" id="formPDF" name="formPDF" class="form-horizontal" action="sus-pdf" target="_blank">
	<input type="hidden" id="hNuevaSolicitud" name="hNuevaSolicitud" value="" />
</form>