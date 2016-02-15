<?php

$maxID=maximo("idUsuario", "usuarioSUS")+1;
$tipoUsuario = (isset($_POST['grupo'])) ? addslashes($_POST['grupo']) : "";
$idEmpleado = (isset($_POST['hdn_id'])) ? addslashes($_POST['hdn_id']) : "";
$usuario = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";
//$idUsuAutoriza = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";

$contrasenia = "contrasenia";
$fechaModif = date('Y-m-d H:i:s');

$valores =	$idEmpleado.','.
			$tipoUsuario.',"'.
			$usuario.'","'.
			$contrasenia.'",1,0,now(),NULL,1';

$insertar = insertar("usuarioSUS", $valores);

if ( $insertar[0] == 1 ) {
} else {
	echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";
}
?>