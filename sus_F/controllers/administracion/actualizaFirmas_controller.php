<?php

$idPuestoAnt = (isset($_POST['idPuestoAnt'])) ? addslashes($_POST['idPuestoAnt']) : "";
$idEmpleado = (isset($_POST['hdn_id'])) ? addslashes($_POST['hdn_id']) : "";



$anterior = seleccionar('*', 'puesto', 'idPuesto='.$idPuestoAnt);
$update= "fechaFin=now() and estatus=0 and fechaModif=now()";
 	
$maxID=maximo("idPuesto", "puesto")+1;
$insert = $maxID.",'".$anterior['puesto']."',".$idEmpleado.",".$anterior['idArea'].",".$anterior['correoPuesto'].",now(),now(),1";

$trans = trNuevoSAC($update,$insert,$idPuestoAnt);

if ( $trans[0] == 1 ) {
} else {
	echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";}

?>