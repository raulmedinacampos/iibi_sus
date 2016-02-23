<?php
session_start();

$seleccion = seleccionarTodo("*","usuarioSUS u JOIN empleado e ON u.idEmpleado = e.idEmpleado","1");

$data = array(
		'seleccion' => $seleccion
);

Flight::render('administracion/listado', $data);
?>