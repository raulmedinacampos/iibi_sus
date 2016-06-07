<?php
session_start();

$id = (isset($_POST['hdnId'])) ? addslashes($_POST['hdnId']) : "";
$grado = (isset($_POST['grado'])) ? addslashes($_POST['grado']) : "";
$nombre = (isset($_POST['nombre'])) ? addslashes($_POST['nombre']) : "";
$apPaterno = (isset($_POST['apPaterno'])) ? addslashes($_POST['apPaterno']) : "";
$apMaterno = (isset($_POST['apMaterno'])) ? addslashes($_POST['apMaterno']) : "";
$area = (isset($_POST['area'])) ? addslashes($_POST['area']) : "";
$puesto = (isset($_POST['puesto'])) ? addslashes($_POST['puesto']) : "";
$rubrica = (isset($_POST['rubrica'])) ? addslashes($_POST['rubrica']) : "";
$telOficina = (isset($_POST['telefonoOf'])) ? addslashes($_POST['telefonoOf']) : "";
$correoInst = (isset($_POST['correoInst'])) ? addslashes($_POST['correoInst']) : "";

$iniciales = strtoupper(substr($nombre, 0, 1).substr($apPaterno, 0, 1).substr($apMaterno, 0, 1));

/*
$tipoPic = $_FILES['rubrica']['type'];
$subida=0;
$ruta = '/opt/csw/share/www/sus/firmas/';
$nombrePic = $id.".".tipoPic;

if (is_uploaded_file($_FILES['rubrica']["tmp_name"])){
//se comprueba que haya subido un archivo	
	if (!($tipoPic=="image/jpeg" || $tipoPic=="image/pjpeg" || $tipoPic=="image/png"))
		 $subida=0;
	else{
		 
		if (move_uploaded_file($_FILES['rubrica']['tmp_name'], $nombrePic))
			//		echo "El archivo ha sido cargado correctamente.";
			$subida=1;
		else
			//echo "Ocurrió algún error al subir el documento. No pudo guardarse.";
			$subida=0;
	}//else comprobación de tipo de archivo
}//comprobación de archivo subido

if($subida==1){

	$valsFirma = = $maxID.",'".$id."','".$ruta."','".$nombreDoc."','/_".date('Y')."/',0,3,".$_SESSION['idUsuario'].",now(),1";
	$actualizar = actualizar('cFirmaSUS', $valsFirma, 'idEmpleado='.$id);
	if ($actualizar[0] == 0){
		$exito=0;
		echo $actualizar[1];}
	else
		$exito=1;
}//del if error
/***/
	
$valsEmpleado = 
	   'gradoAcad 	= "'.$grado.'",
		nombre 		= "'.$nombre.'",
		apellidoP 	= "'.$apPaterno.'",
		apellidoM	= "'.$apMaterno.'",
		iniciales 	= "'.$iniciales.'",
		idFirmaSUS	= "'.$idFirmaSUS.'",
		telOficina	= "'.$telOficina.'",
		eMailOf		= "'.$correoInst.'",
		fechaModif 	= now()';

$actualizar = actualizar('empleado', $valsEmpleado, 'idEmpleado='.$id);
if ($actualizar[0] == 0){
	$exito=0;
	echo $actualizar[1];}
else 
	$exito=1;

$valsPuesto = 
	   'puesto		= "'.$puesto.'",
		idArea		= "'.$area.'",
		fechaModif	= now()';
			
$actualizar = actualizar('puesto', $valsPuesto, 'estatus = 1 and idEmpleado='.$id);
if ($actualizar[0] == 0){
	$exito=0;
	echo $actualizar[1];}
else 
	$exito=1;

if($exito==1)
	echo $_SESSION['tipoUsuario'];
else 
	echo "0";
?>