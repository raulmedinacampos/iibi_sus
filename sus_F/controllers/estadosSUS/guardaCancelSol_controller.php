<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$motivo=(isset($_POST['motivo'])) ? addslashes($_POST['motivo']) : "";

$valores = "motivo='Cancelado por ".$motivo."', idUsuVerific=".$_SESSION['idUsuario'].", estatus=9, fechaModif=now()";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

if ( $actualizar[0] == 0 ) {
	/*Actualizar la lista de estados de solicitudes*/
} else {
	echo "Ocurió un problema con la evaluación, favor de comunicarse con el adminsitrador.";
}
?>