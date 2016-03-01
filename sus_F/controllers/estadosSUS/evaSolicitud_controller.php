<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$eva= (isset($_POST['eva'])) ? addslashes($_POST['eva']) : "";
$obsEva= (isset($_POST['obsEva'])) ? addslashes($_POST['obsEva']) : "";

$valores = "evaluacion='".$eva."', obsEva='".$obsEva."', estatus=11, fechaModif=now()";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
if ($actualizar [0] == 1 and $actualizar[1]==1) 
	echo "1";
else
	echo "0";
?>