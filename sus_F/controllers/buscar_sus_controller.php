<?php
session_start();

$folio = (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$encontrado = seleccionarSinMsj('*', "archivoDigital","folio='".$folio."' and tipo='SUS'");

if($encontrado[0]==1)
	$nombre = "132.248.242.11/sus/archivo".$encontrado['ruta'].$encontrado['nombre'];
else
	$nombre= 0;

$archivo = array(
		'nombre' => $nombre);

Flight::render('servicios/estadoSUS', $data);
?>