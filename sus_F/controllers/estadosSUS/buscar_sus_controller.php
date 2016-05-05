<?php
session_start();

$folio = (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$encontrado = seleccionar('count','servicioSUS',"folio='".$folio."' and estado=12");
if($encontrado==0)
	echo 0; //no se ha archivado la solicitud por lo que no debe haber digital

else{
	$folio = str_replace("/", "-", $folio);
	$encontrado = seleccionar('*', "archivoDigital","folio='".$folio."' and tipo='SUS'");
	
	if($encontrado!=0)
		echo	"/sus/archivo".$encontrado['ruta'].$encontrado['nombre'];
	else
		echo	"-1";} //hubo un error en la recuperación del archivo
?>