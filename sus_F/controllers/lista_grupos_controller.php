<?php
session_start();

$grupo = seleccionarTodo("*","cTipoUsuarioSUS","estatus=1");
$gpo = array();

if ( isset($grupo[1]) && mysqli_num_rows($grupo[1]) > 0 ) {
	while( $row = mysqli_fetch_array($grupo[1]) ) {
		$gpo[] = array("id"=>$row['idTipoUsuarioSUS'], "grupo"=>$row['tipoUsuarioSUS']);
	}
}

echo json_encode($gpo);
?>