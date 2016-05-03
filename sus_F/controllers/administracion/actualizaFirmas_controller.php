<?php

$id_srio_ant = (isset($_POST['id_srio_ant'])) ? addslashes($_POST['id_srio_ant']) : "";
$id_sg_ant = (isset($_POST['id_sg_ant'])) ? addslashes($_POST['id_sg_ant']) : "";

$id_sg = (isset($_POST['hdn_id_sg'])) ? addslashes($_POST['hdn_id_sg']) : "";
$id_srio = (isset($_POST['hdn_id_srio'])) ? addslashes($_POST['hdn_id_srio']) : "";


if($id_srio_ant!=''){
	$anterior = seleccionar('*', 'puesto', 'idPuesto='.$id_srio_ant);
}

if($id_sg_ant!=''){
	$anterior = seleccionar('*', 'puesto', 'idPuesto='.$id_sg_ant);
}

$update= "fechaFin=now() and estatus=0 and fechaModif=now()";
 	
$maxID=maximo("idPuesto", "puesto")+1;
$insert = $maxID.",'".$anterior['puesto']."',".$idEmpleado.",".$anterior['idArea'].",".$anterior['correoPuesto'].",now(),now(),1";

$trans = trNuevoSAC($update,$insert,$idPuestoAnt);

if ( $trans[0] == 1 ) {
} else {
	echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";}

?>

