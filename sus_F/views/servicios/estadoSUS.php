<link href="css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="js/estado_solicitud.js"></script>

<h3>Estado de solicitudes del mes de <?php echo $mes; ?></h3>

<div class="botones">
	<button class="btn btn-sm btn-info">Consultar mes anterior</button>
	<button class="btn btn-sm btn-info">Consultar mes siguiente</button>
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