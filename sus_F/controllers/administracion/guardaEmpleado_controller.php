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

$iniciales = strtoupper(substr($nombre, 0, 1).substr($apPaterno, 0, 1).substr($apMaterno, 0, 1));

/*Para subir la rubrica*/
//$tipoPic = $_FILES['firma']['type'];
$subida=0;
$tipoPic = "jpg";
$ruta = '/opt/csw/share/www/sus/firmas/';
$nombrePic = $ruta.$iniciales.".".$tipoPic;
/*
if (is_uploaded_file($_FILES['firma']["tmp_name"])){
//se comprueba que haya subido un archivo

	if (!($tipoPic=="image/jpeg" || $tipoPic=="image/pjpeg" || $tipoPic=="image/png"))
		$subida=0;
	else{
	 		
		if (move_uploaded_file($_FILES['firma']['tmp_name'], $nombrePic))
	 		//		echo "El archivo ha sido cargado correctamente.";
	 		$subida=1;
 		else
 			//echo "Ocurrió algún error al subir el documento. No pudo guardarse.";
			$subida=0;
	}//else comprobación de tipo de archivo
}//comprobación de archivo subido
/*Fin para subir la rubrica*/
$subida=1;
if($subida==1){
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
	echo $insertar[0];}
else 
	echo 0;
?>