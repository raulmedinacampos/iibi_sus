<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<p><br /><h3>Estado de solicitudes</h3></p>

<?php
if ( $row = mysqli_fetch_array($seleccion[1]) ) {
?>
<table border=1>
	<tr>
		<td align="center"><strong>Folio</strong></td>
		<td align="center"><strong>Fecha</strong></td>
		<td align="center"><strong>Tipo</strong></td>
		<td align="center"><strong>Descripción</strong></td>
		<td align="center"><strong>Estado</strong></td>
		<td align="center"><strong>Acción</strong></td>
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
        <td align="center"><?=$dato['estatus']?></td>
		<td align="center"><?=$dato['acciones']?></td>
	</tr>
    <?php
	}
	?>
</table>
<?php
}
?>