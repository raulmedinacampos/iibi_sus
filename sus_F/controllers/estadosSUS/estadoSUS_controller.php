<?php

session_start();
	
$servicios = seleccionarTodo("idTipoServicio,servicio", "cTipoServicio", "idTipoServicioPadre=0");
$estados= seleccionarTodo("idEstatusSUS,estatus", "cEstatusSUS", "1");

$data = array(
		'estados' => $estados,
		'servicios' => $servicios
);

Flight::render('servicios/estadoSUS', $data);

?>