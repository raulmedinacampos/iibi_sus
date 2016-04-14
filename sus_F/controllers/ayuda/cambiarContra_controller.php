<?php
require 'inc/correos.inc.php' ;
require 'inc/herramientas.inc.php';
session_start();
$exito="";

$conf = (isset($_POST['conf'])) ? addslashes($_POST['conf']) : "";

if($conf!=""){
	
	$newContra= generarClave();
	$valores= "contrasenia='".$newContra."'";
	$condicion = 'idUsuario='.$_SESSION ['idUsuario'];
	
	$actualizar = actualizar ( "usuarioSUS", $valores, $condicion );
	
	if ($actualizar [0] == 1 and $actualizar[1]==1){
		
		$valores   = "eMailOf, concat(gradoAcad,' ',nombre,' ',apellidoP,' ',apellidoM) as nombre, usuario, contrasenia";
		$tablas    = 'empleado, usuarioSUS';
		$condicion = 'empleado.idEmpleado = usuarioSUS.idEmpleado and usuarioSUS.idUsuario = '.$_SESSION['idUsuario']."'";
		
		$datosUsu = seleccionarSinMsj($valores, $tablas, $condicion);
		$exito= mailContra($datosUsu['nombre'], $datosUsu['eMailOf'],$usuario, $contrasenia);
	}
	else //si no se actualizó
	$exito=0;
}

echo $exito;

?>