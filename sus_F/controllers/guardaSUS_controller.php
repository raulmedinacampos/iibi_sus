<?php
session_start();
require 'inc/correos.inc.php' ;
require("inc/herramientas.inc.php");

$consecutivo = maxEnAnio('consecutivo','fechaSolicitud','servicioSUS')+1;
$folio = "$consecutivo/".date('Y');

$servicio = $_POST['servicio'];

if ( !empty($_POST['nomSol']) ) {
	$nomSol = $_POST['nomSol'];
} else {
	$usuario = seleccionar('*','persona',"idPersona=".$_SESSION['idPersona']);
	$nomSol = $usuario['gradoAcad']." ".$usuario['nombres']." ".$usuario['apellidoP']." ".$usuario['apellidoM'];
}

if ( !empty($_POST['descripcion']) ) {
	$desc = $_POST['descripcion'];
} else {
	$desc = "Sin descripción del servicio.";
}

if ( !empty($_POST['detalle']) ) {
	$detalle = $_POST['detalle'];
} else {
	$detalle = "";
}

if ( $servicio == 13 || $servicio==23 || $servicio == 36 || $servicio == 69 ) {
	$otro = $_POST['txt_otro'];
} else {
	$otro = NULL;
}
//echo $servicio;
$tabla = 'servicioSUS (folio,consecutivo,idTipoServicio,otro,descripcion,detalle,fechaSolicitud,nomSolicitante,idUSolicitante,estatus)';
$valores = "'".$folio."',".$consecutivo.",".$servicio.",'".$otro."','".$desc."','".$detalle."',now(),'".$nomSol."',".$_SESSION['idUsuario'].",1";
$insertar = insertar($tabla,$valores);

if ( $insertar[0] == 1 ){
	
	$tipoServicio = seleccionarSinMsj("servicio", 'cTipoServicio', "idTipoServicio='".$servicio."'");
	$exito = mailNewSol($tipoServicio['servicio'], $nomSol, $folio);
	
	if($exito == 1)
		echo $folio;
}
?>