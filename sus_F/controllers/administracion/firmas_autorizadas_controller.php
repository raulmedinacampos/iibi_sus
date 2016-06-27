<?php
session_start();

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=4 and puesto='Secretario'";
$secretario = seleccionar("*, puesto.idPuesto as idPuesto ", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=42 and puesto='Jefe de Departamento'";
$sGenerales = seleccionar("*, puesto.idPuesto as idPuesto", "empleado,puesto", $condicion);

/*$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=6 and puesto='Jefe de Departamento'";
$personal = seleccionar("*", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=8 and puesto='Jefe de Departamento'";
$presupuesto = seleccionar("*", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=7 and puesto='Jefe de Departamento'";
$bienes = seleccionar("*", "empleado,puesto", $condicion);
*/

$data = array(
		'secretario' => $secretario,
		'sGenerales'  => $sGenerales,
/*		'personal'	  => $personal,
		'presupuesto' => $presupuesto,
		'bienes'      => $bienes
		*/);

Flight::render('administracion/firmas_autorizadas', $data);
?>