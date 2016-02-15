<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$evaluacion = (isset($_POST['evaluacion'])) ? addslashes($_POST['evaluacion']) : "";
$obsEva = (isset($_POST['obsEva'])) ? addslashes($_POST['obsEva']) : "";

$valores = "evaluacion='".$evaluacion."',obsEva='".$obsEva."', estatus=11, fechaModif=now()";

$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

if ( $actualizar[0] == 0 ) {
	/*Actualizar la lista de estados de solicitudes*/
} else {
	echo "Ocurió un problema con la evaluación, favor de comunicarse con el adminsitrador.";
}
?>