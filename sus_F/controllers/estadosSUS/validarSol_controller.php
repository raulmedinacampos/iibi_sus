<?php
session_start ();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$valores = "fechaVerific = now(), idUsuVerific=" . $_SESSION ['idUsuario'] . ", estatus=8, fechaModif=now()";
/* Falta función para calcular la fecha de liberación según tabla de base de datos */
$actualizar = actualizar ( "servicioSUS", $valores, "folio='" . $folio . "'" );

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
//	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error. 

//echo "Actualizar[0] ".$actualizar[0]. ". Actualizar[1] ".$actualizar[1];

if ($actualizar [0] == 0 and $actualizar[1]!=1) {
	echo "<p>Ocurió un problema, favor de comunicarse con el adminsitrador.</p>";
	unset ($actualizar);}
?>