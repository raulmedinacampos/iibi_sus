<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$actualizar = actualizar('servicioSUS','visible = 0','folio = "'.$folio.'"');

if ( $actualizar[0] == 0 ) {
	echo "<p>La solicitud ha sido archivada</p>";
} else {
	echo "<p>Ocurió un problema con la evaluación, favor de comunicarse con el adminsitrador.</p>";
}
?>