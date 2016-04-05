<?php
session_start();
require 'inc/correos.inc.php' ;


$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$obs= (isset($_POST['obs'])) ? addslashes($_POST['obs']) : "";

$valores = "fechaLiberacion = now(), estatus=10, fechaModif=now(), motivo='".$obs."'";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
if ($actualizar [0] == 1 and $actualizar[1]==1){
		//	echo "1";
		$valores   = "eMailOf, concat(gradoAcad,' ',nombre,' ',apellidoP,' ',apellidoM) as nombre";
		$tablas    = 'empleado, usuarioSUS';
		$condicion = 'empleado.idEmpleado = usuarioSUS.idEmpleado and usuarioSUS.idUsuario = (select idUSolicitante from servicioSUS where folio = "'.$folio.'")';
	
		$datosUsu = seleccionarSinMsj($valores, $tablas, $condicion);
		$exito= mailTerminacion($datosUsu['nombre'], $datosUsu['eMailOf'], $folio);
	}
else
		echo $exito=0;
	
echo $exito;
	
?>