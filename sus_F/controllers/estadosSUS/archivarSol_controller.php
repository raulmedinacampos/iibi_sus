<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$actualizar = actualizar('servicioSUS','visible = 0, estatus=12' ,'folio = "'.$folio.'"');

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
if ($actualizar [0] == 1 and $actualizar[1]==1) 
	echo "1";
else
	echo "0";
?>