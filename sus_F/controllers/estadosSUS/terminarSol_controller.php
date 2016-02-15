<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$valores = "fechaLiberacion = now(), estatus=10, fechaModif=now()";
/*Falta función para calcular la fecha de liberación según tabla de base de datos*/
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

if ( $actualizar[0] == 0 ) {
	/*Actualizar la lista de estados de solicitudes*/
} else {
	echo "Ocurió un problema con la evaluación, favor de comunicarse con el adminsitrador.";
}
?>