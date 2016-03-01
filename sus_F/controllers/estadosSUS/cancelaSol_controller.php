<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$motivo=(isset($_POST['motivo'])) ? addslashes($_POST['motivo']) : "";

$valores = "motivo='".$motivo."', idUsuVerific=".$_SESSION['idUsuario'].", estatus=9, fechaModif=now(), fechaLiberacion = now()";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
if ($actualizar [0] == 1 and $actualizar[1]==1) 
	echo "1";
else
	echo "0";
?>