<?php
require 'inc/herramientas.inc.php';

$maxID=maximo("idUsuario", "usuarioSUS")+1;
$tipoUsuario = (isset($_POST['grupo'])) ? addslashes($_POST['grupo']) : "";
$idEmpleado = (isset($_POST['hdn_id'])) ? addslashes($_POST['hdn_id']) : "";
$usuario = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";
$idUsuAutoriza = (isset($_POST['autoriza'])) ? addslashes($_POST['autoriza']) : "";
$contrasenia = generarClave();

$valores =	$maxID.','.$idEmpleado.','.$tipoUsuario.',"'.$usuario.'","'.$contrasenia.'",NULL,0,now(),NULL,now(),1';

$insertar = insertar("usuarioSUS", $valores);

if ( $insertar[0] == 0 ) 
	echo $insertar[1];

?>