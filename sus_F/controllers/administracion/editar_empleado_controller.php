<?php
session_start();

$id = (isset($_POST['id'])) ? $_POST['id'] : $_SESSION['idEmpleado'];

$grado = seleccionarTodo("*","cGradoAcad","1 ORDER BY jerarquia, descripcion");
$area = seleccionarTodo("*","cArea","estatus = 1 ORDER BY jerarquia, area");
$puesto = seleccionarTodo("*","cPuesto","1 ORDER BY jerarquia, nombre");

$empleado = seleccionar("*","empleado,puesto","empleado.idEmpleado= puesto.idEmpleado and puesto.estatus= 1 and empleado.idEmpleado = ".$id);

$data = array(
		'grado' => $grado,
		'area' => $area,
		'puesto' => $puesto,
		'empleado' => $empleado
);

Flight::render('administracion/edicion_empleado', $data);
?>