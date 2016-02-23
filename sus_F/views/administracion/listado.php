<link href="css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<script src="js/listado_usuarios.js" type="text/javascript"></script>

<h3>Listado de usuarios</h3>
<?php
if ( mysqli_num_rows($seleccion[1]) > 0 ) {
?>
<table class="table table-condensed table-striped">
	<tr>
		<th>Usuario</th>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php
	while ( $row = mysqli_fetch_array($seleccion[1]) ) {
	?>
	<tr>
		<td><?php echo $row['usuario']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><a href="#" data-id="<?php echo $row['idEmpleado']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
	</tr>
	<?php
	}
	?>
</table>
<?php
}
?>