<?php
session_start();

$empleado = (isset($_SESSION['idEmpleado'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']) : "";
$responsable = (isset($_SESSION['idUAutoriza'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']) : "";
$area = (isset($_SESSION['idUAutoriza'])) ? seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado=empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']) : "";


$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];

$data = array(
		'area' => $area,
		'empleado' => $empleado,
		'nomResponsable' => $nomResponsable,
		'nomUsuario' => $nomUsuario
);

Flight::render('servicios/sus', $data);
?>