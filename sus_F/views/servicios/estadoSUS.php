<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<p><br /><h3>Estado de solicitudes</h3></p>

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
		<td align="center"><span onclick="detalleSUS('<?=$dato['folio']?>')"><?=$dato['folio']?></span></td>
		<td><span onclick="detalleSUS('<?=$dato['folio']?>')"><?=$dato['fecha']?></span></td>
        <td><span onclick="detalleSUS('<?=$dato['folio']?>')"><?= $dato['servicio']?></span></td>
        <td><span onclick="detalleSUS('<?=$dato['folio']?>')"><?= $dato['descripcion']?></span></td>
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