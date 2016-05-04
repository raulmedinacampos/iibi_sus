<?php
session_start();

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=5 and puesto='Secretario'";
$secretario = seleccionar("*, puesto.idPuesto as idPuesto ", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=9 and puesto='Jefe de área'";
$sGenerales = seleccionar("*, puesto.idPuesto as idPuesto", "empleado,puesto", $condicion);

/*$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=6 and puesto='Jefe de departamento'";
$personal = seleccionar("*", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=8 and puesto='Jefe de departamento'";
$presupuesto = seleccionar("*", "empleado,puesto", $condicion);

$condicion ="empleado.idEmpleado = puesto.idEmpleado and puesto.estatus = 1 and idArea=7 and puesto='Jefe de departamento'";
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