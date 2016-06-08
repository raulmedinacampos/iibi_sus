<?php
session_start();

$grado = (isset($_POST['grado'])) ? addslashes($_POST['grado']) : "";
$nombre = (isset($_POST['nombre'])) ? addslashes($_POST['nombre']) : "";
$apPaterno = (isset($_POST['apPaterno'])) ? addslashes($_POST['apPaterno']) : "";
$apMaterno = (isset($_POST['apMaterno'])) ? addslashes($_POST['apMaterno']) : "";

$area = (isset($_POST['area'])) ? addslashes($_POST['area']) : "";
$puesto = (isset($_POST['puesto'])) ? addslashes($_POST['puesto']) : "";
$telOficina = (isset($_POST['telefonoOf'])) ? addslashes($_POST['telefonoOf']) : "";
$correoInst = (isset($_POST['correoInst'])) ? addslashes($_POST['correoInst']) : "";
$nombrePic="";

$iniciales = strtoupper(substr($nombre, 0, 1).substr($apPaterno, 0, 1).substr($apMaterno, 0, 1));

$valsEmpleado ='"'.$grado.'", "'.
	$nombre.'","'.
	$apPaterno.'","'.
	$apMaterno.'","'.
	$iniciales.'","'.
	$nombrePic.'","'.
	$telOficina.'","'.
	$correoInst.'"';

$valsPuesto = '"'.$puesto.'", '.$area;
$insertar = trInsertEmpleado($valsEmpleado, $valsPuesto);

if ($insertar[0]==1)
	echo json_encode($insertar[2]);
else
	echo 0;


?>