<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$obs= (isset($_POST['obs'])) ? addslashes($_POST['obs']) : "";

$valores = "fechaLiberacion = now(), estatus=10, fechaModif=now(), motivo='".$obs."'";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
//	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error.
/*if ($actualizar [0] == 1 and $actualizar[1]==1)
	echo "<p>El servicio se concluyó.</p>";
 else 
	echo "<p>Ocurió un problema, favor de comunicarse con el adminsitrador.</p>";
*/
unset ($actualizar);
?>