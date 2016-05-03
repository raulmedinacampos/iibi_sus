<?php

$id_srio_ant = (isset($_POST['id_srio_ant'])) ? addslashes($_POST['id_srio_ant']) : "";
$id_sg_ant = (isset($_POST['id_sg_ant'])) ? addslashes($_POST['id_sg_ant']) : "";

$id_sg = (isset($_POST['hdn_id_sg'])) ? addslashes($_POST['hdn_id_sg']) : "";
$id_srio = (isset($_POST['hdn_id_srio'])) ? addslashes($_POST['hdn_id_srio']) : "";

$hacerTrans=0;

if($id_srio!=''&&$$id_srio_ant!=''){
	$anterior = seleccionar('*', 'puesto', 'idPuesto='.$id_srio_ant);
	$idEmpleado = $id_srio;
	$idPuestoAnt = $id_srio_ant;
	$hacerTrans=1;
}
elseif($id_sg!=''&&$id_sg_ant!=''){
	$anterior = seleccionar('*', 'puesto', 'idPuesto='.$id_sg_ant);
	$idEmpleado = $id_sg;
	$idPuestoAnt= $id_sg_ant;
	$hacerTrans=1;
}

if($hacerTrans==1){	
	$update= "fechaFin=now() and estatus=0 and fechaModif=now()";
	
	$maxID=maximo("idPuesto", "puesto")+1;
	$insert = $maxID.",'".$anterior['puesto']."',".$idEmpleado.",".$anterior['idArea'].",".$anterior['correoPuesto'].",now(),NULL,now(),1";
	
	$trans = trNuevoSAC($update,$insert,$idPuestoAnt);
	
	if ( $trans[0] == 1 )
		echo "Se actualizó el nombre de la persona satisfactoriamente.";
	
		else
			echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";}
else
	{echo "[TR] Ocurió un problema, favor de comunicarse con el adminsitrador.";} 
?>