<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />
<link href="css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="js/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/estado_solicitud.js"></script>

<h3>Estado de solicitudes</h3>

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
					</select>
				</div>
				
				<label class="col-sm-2 control-label">Estado</label>
				<div class="col-sm-4">
					<select id="estado" name="estado" class="form-control">
						<option value="">Seleccione</option>
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

<?php
if ( $row = mysqli_fetch_array($seleccion[1]) ) {
?>
<table class="table table-condensed table-striped">
	<tr>
		<th align="center">Folio</th>
		<th align="center">Fecha</th>
		<th align="center">Tipo</th>
		<th align="center">Estado</th>
		<th align="center">Acción</th>
		<th align="center">Respaldo</th>
	</tr>
    <?php
    foreach ( $datos as $dato ) {
		$idUSolicitante = $dato['idUSolicitante'];
	?>
    <tr>
		<td><a href="#" data-folio="<?=$dato['folio']?>"><?=$dato['folio']?></a></td>
		<td><?=$dato['fecha']?></td>
        <td><?= $dato['servicio']?></td>
        <td><?=$dato['estatus']?></td>
		<td align="center"><?=$dato['acciones']?></td>
		<td align="center"><button class="btn btn-sm btn-info btn-pdf" data-folio="<?=$dato['folio']?>">PDF</button></td>
	</tr>
    <?php
	}
	?>
</table>
<?php
}
?>

<form method="post" id="formPDF" name="formPDF" class="form-horizontal" action="sus-pdf" target="_blank">
	<input type="hidden" id="hNuevaSolicitud" name="hNuevaSolicitud" value="" />
</form>