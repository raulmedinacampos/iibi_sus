<?php

$maxID=maximo("idUsuario", "usuarioSUS")+1;
$tipoUsuario = (isset($_POST['grupo'])) ? addslashes($_POST['grupo']) : "";
$idEmpleado = (isset($_POST['hdn_id'])) ? addslashes($_POST['hdn_id']) : "";
$usuario = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";
$idUsuAutoriza = (isset($_POST['autoriza'])) ? addslashes($_POST['autoriza']) : "";
$contrasenia = "contra";

//$contrasenia = generarClave();
//$fechaModif = date('Y-m-d H:i:s');

$valores =	$idEmpleado.','.
			$tipoUsuario.',"'.
			$usuario.'","'.
			$contrasenia.'",1,0,now(),NULL,1';

$insertar = insertar("usuarioSUS", $valores);

if ( $insertar[0] == 0 ) 
	echo $insertar[1];

?>