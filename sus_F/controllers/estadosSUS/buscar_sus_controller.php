<?php
session_start();

$folio = (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$folio = str_replace("/", "-", $folio);
$encontrado = seleccionar('*', "archivoDigital","folio='".$folio."' and tipo='SUS'");
if($encontrado!=0)
	echo	"/sus/archivo".$encontrado['ruta'].$encontrado['nombre'];
else
	echo	0;

?>