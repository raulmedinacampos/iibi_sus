<?php
session_start();

$idEmpleado= (isset($_POST['idEmpleado'])) ? addslashes($_POST['idEmpleado']) : "";
$iniciales= (isset($_POST['iniciales'])) ? addslashes($_POST['iniciales']) : "";

//consulta para obtener las iniciales

$subida=0;
$tipoPic = substr ( $_FILES['firma']['type'], 6);
//con substring quito "image/"
$ruta = '/opt/csw/share/www/sus/firmas/';
$nombrePic = $ruta.$iniciales.".".$tipoPic;
$firma = "firmas/".$iniciales.".".$tipoPic;

if (is_uploaded_file($_FILES['firma']["tmp_name"])){
 //se comprueba que haya subido un archivo

 if (!($tipoPic=="jpeg" || $tipoPic=="pjpeg" || $tipoPic=="png"))
 	$subida=0;
 	else{

 if (move_uploaded_file($_FILES['firma']['tmp_name'], $nombrePic))
 	//echo "El archivo ha sido cargado correctamente.";
 	$subida=1;
 else
 	//echo "Ocurrió algún error al subir el documento. No pudo guardarse.";
 	$subida=0;
 	}//else comprobación de tipo de archivo

}//comprobación de archivo subido

if($subida==1)
	$actualiza = actualizar('empleado',"firma='".$firma."'", 'idEmpleado='.$idEmpleado);

echo $subida;
?>