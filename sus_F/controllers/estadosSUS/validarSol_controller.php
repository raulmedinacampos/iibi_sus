<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$valores = "fechaVerific = now(), idUsuVerific=".$_SESSION['idUsuario'].", estatus=6, fechaModif=now()";
/*Falta función para calcular la fecha de liberación según tabla de base de datos*/
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

if ( $actualizar[0] == 0 ) {
	echo "<p>La solicitud ha sido validada</p>";
} else {
	echo "<p>Ocurió un problema con la evaluación, favor de comunicarse con el adminsitrador.</p>";
}
?>