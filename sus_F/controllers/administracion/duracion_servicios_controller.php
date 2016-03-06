<?php
session_start();
$condicion ="idTipoServicioPadre!=0 and servicio!='Otro'";
$servicio = seleccionarTodo("idTipoServicio,servicio,duracionEstimada", "cTipoServicio",$condicion );

$data = array(
	'servicio' => $servicio);

Flight::render('administracion/duracion_servicios', $data);
?>