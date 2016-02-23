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
		<th>Folio</th>
		<th>Fecha</th>
		<th>Tipo</th>
		<th>Descripción</th>
		<th>Estado</th>
		<th>Acción</th>
	</tr>
    <?php
    foreach ( $datos as $dato ) {
		$idUSolicitante = $dato['idUSolicitante'];
	?>
    <tr>
		<td align="center"><a href="#" data-folio="<?=$dato['folio']?>"><?=$dato['folio']?></a></td>
		<td><?=$dato['fecha']?></td>
        <td><?= $dato['servicio']?></td>
        <td><?= $dato['descripcion']?></td>
        <td><?=$dato['estatus']?></td>
		<td align="center"><?=$dato['acciones']?></td>
	</tr>
    <?php
	}
	?>
</table>
<?php
}
?>