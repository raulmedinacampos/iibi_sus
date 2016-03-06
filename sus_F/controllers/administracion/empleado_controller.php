<?php
session_start();

$grado = seleccionarTodo("*","cGradoAcad","1 ORDER BY descripcion");
$area = seleccionarTodo("*","cArea","areaPadre != 0 and estatus = 1 ORDER BY jerarquia, area ");
$puesto = seleccionarTodo("*","cPuesto","1 ORDER BY nombre");


$data = array(
		'grado' => $grado,
		'area' => $area,
		'puesto' => $puesto,
);

Flight::render('administracion/alta_empleado', $data);
?>