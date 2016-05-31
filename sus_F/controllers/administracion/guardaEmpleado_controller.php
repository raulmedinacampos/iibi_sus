<?php

$grado = (isset($_POST['grado'])) ? addslashes($_POST['grado']) : "";
$nombre = (isset($_POST['nombre'])) ? addslashes($_POST['nombre']) : "";
$apPaterno = (isset($_POST['apPaterno'])) ? addslashes($_POST['apPaterno']) : "";
$apMaterno = (isset($_POST['apMaterno'])) ? addslashes($_POST['apMaterno']) : "";
$telefono = (isset($_POST['telefono'])) ? addslashes($_POST['telefono']) : "";
$celular = (isset($_POST['celular'])) ? addslashes($_POST['celular']) : "";
$correo = (isset($_POST['correo'])) ? addslashes($_POST['correo']) : "";
$rfc = (isset($_POST['rfc'])) ? addslashes($_POST['rfc']) : "";
$curp = (isset($_POST['curp'])) ? addslashes($_POST['curp']) : "";
$area = (isset($_POST['area'])) ? addslashes($_POST['area']) : "";
$puesto = (isset($_POST['puesto'])) ? addslashes($_POST['puesto']) : "";
$fechaEntrada = (isset($_POST['fechaEntrada'])) ? addslashes($_POST['fechaEntrada']) : "";
$numTrabajador = (isset($_POST['numTrabajador'])) ? addslashes($_POST['numTrabajador']) : "";
$idFirmaSUS= (isset($_POST['idFirmaSUS'])) ? addslashes($_POST['idFirmaSUS']) : "";

$telOficina = (isset($_POST['telefonoOf'])) ? addslashes($_POST['telefonoOf']) : "";
$correoInst = (isset($_POST['correoInst'])) ? addslashes($_POST['correoInst']) : "";
$correoPuesto = (isset($_POST['correoPuesto'])) ? addslashes($_POST['correoPuesto']) : "";

$iniciales = strtoupper(substr($nombre, 0, 1).substr($apPaterno, 0, 1).substr($apMaterno, 0, 1));

$valsEmpleado ='"'.$grado.'", "'.
			$nombre.'","'.
			$apPaterno.'","'.
			$apMaterno.'","'.
			$iniciales.'","'.
			$numTrabajador.'","'.
			$idFirmaSUS.'","'.
			$telefono.'","'.
			$celular.'","'.
			$telOficina.'","'.
			$correo.'","'.
			$correoInst.'","'.
			$fechaEntrada.'","'.
			$rfc.'","'.
			$curp.'"';

$valsPuesto = '"'.$puesto.'", '.$area.', "'.$correoPuesto.'","'.$fechaEntrada.'"';
			
$insertar = trInsertEmpleado($valsEmpleado, $valsPuesto);

echo $insertar[0];

?>