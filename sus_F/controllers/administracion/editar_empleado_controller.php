<?php
session_start();

$id = (isset($_POST['id'])) ? $_POST['id'] : "";

$grado = seleccionarTodo("*","cGradoAcad","1 ORDER BY jerarquia, descripcion");
$area = seleccionarTodo("*","cArea","estatus = 1 ORDER BY jerarquia, area");
$puesto = seleccionarTodo("*","cPuesto","1 ORDER BY jerarquia, nombre");
$empleado = seleccionar("*","empleado","idEmpleado = ".$id);

$data = array(
		'grado' => $grado,
		'area' => $area,
		'puesto' => $puesto,
		'empleado' => $empleado
);

Flight::render('administracion/edicion_empleado', $data);
?>