<?php
session_start();

$seleccion = seleccionarTodo("*","usuarioSUS u JOIN empleado e ON u.idEmpleado = e.idEmpleado JOIN cTipoUsuarioSUS t ON u.tipoUsuario = t.idTipoUsuarioSUS","u.estatus=1 order by tipoUsuarioSUS asc, e.apellidoP asc");

$data = array(
		'seleccion' => $seleccion
);

Flight::render('administracion/listado', $data);
?>