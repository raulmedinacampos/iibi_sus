<?php
session_start();

$grado = seleccionarTodo("*","cGradoAcad","1 ORDER BY jerarquia, descripcion");
$area = seleccionarTodo("*","cArea","estatus = 1 ORDER BY jerarquia, area");
$puesto = seleccionarTodo("*","cPuesto","1 ORDER BY jerarquia, nombre");

$data = array(
		'grado' => $grado,
		'area' => $area,
		'puesto' => $puesto
);

Flight::render('administracion/alta_empleado', $data);
?>