<?php
require 'inc/herramientas.inc.php';
require 'inc/correos.inc.php';

$maxID=maximo("idUsuario", "usuarioSUS")+1;
$tipoUsuario = (isset($_POST['grupo'])) ? addslashes($_POST['grupo']) : "";
$idEmpleado = (isset($_POST['hdn_id'])) ? addslashes($_POST['hdn_id']) : "";
$idUsuAutoriza = (isset($_POST['autoriza'])) ? addslashes($_POST['autoriza']) : "";
$contrasenia = generarClave();

$nomEmp = seleccionarSinMsj("nombre, apellidoP, apellidoM", "empleado", "idEmpleado=".$idEmpleado);
$usuario =generarUsuario($nomEmp['nombre'], $nomEmp['apellidoP'], $nomEmp['apellidoM']);

$valores =	$maxID.','.$idEmpleado.','.$tipoUsuario.',"'.$usuario.'","'.$contrasenia.'",NULL,"'.$idUsuAutoriza.'",now(),NULL,now(),1';
$insertar = insertar("usuarioSUS", $valores);

if ($insertar[0] == 1 and $insertar[1]==1){
	$valores   = "eMailOf, concat(gradoAcad,' ',nombre,' ',apellidoP,' ',apellidoM) as nombre";
	$tablas    = 'empleado, usuarioSUS';
	$condicion = 'empleado.idEmpleado = usuarioSUS.idEmpleado and usuarioSUS.idUsuario = "'.$maxID.'"';

	$datosUsu = seleccionarSinMsj($valores, $tablas, $condicion);
	$exito= mailEnvioContra($datosUsu['nombre'], $datosUsu['eMailOf'], $usuario, $contrasenia);}
	
else
	$exito=0;

echo $exito;
?>