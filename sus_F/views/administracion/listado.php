<link href="css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<script src="js/listado_usuarios.js" type="text/javascript"></script>

<h3>Listado de usuarios</h3>
<p>A continuación se muestra la lista de usuarios autorizados en el sistema. Para ajustar los datos del usuario, permisos o darlo de baja, de click en los íconos situados a la extrema derecha.</p>
<?php
if ( mysqli_num_rows($seleccion[1]) > 0 ) {
?>
<table class="table table-condensed table-striped">
	<tr>
		<th>Usuario</th>
		<th>Nombre</th>
		<th>Perfil</th>
		<th class="text-center">Acciones</th>
	</tr>
	<?php
	while ( $row = mysqli_fetch_array($seleccion[1]) ) {
	?>
	<tr>
		<td><?php echo $row['usuario']; ?></td>
		<td><?php echo $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']; ?></td>
		<td><?php echo $row['tipoUsuarioSUS']?></td>
		<td class="text-center">
			<a href="#" data-id="<?php echo $row['idEmpleado']; ?>" class="editar" title="Modificar datos de usuario" data-toggle="tooltip">
				<span class="glyphicon glyphicon-pencil"></span>
			</a>
			<a href="#" data-id="<?php echo $row['idEmpleado']; ?>" class="administrar" title="Modificar perfil de usuario" data-toggle="tooltip">
				<span class="glyphicon glyphicon-cog"></span>
			</a>
			<a href="#" data-id="<?php echo $row['idUsuario']; ?>" class="eliminar" title="Eliminar usuario" data-toggle="tooltip">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php
	}
	?>
</table>
<?php
}
?>