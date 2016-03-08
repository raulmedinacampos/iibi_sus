<?php
session_start();

$folio = (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$ruta = '/opt/csw/share/www/sus/archivo/_'.date('Y');
$nombreDoc = basename($_FILES['userfile']['name']); 
$tipoDoc = $_FILES['userfile']['type'];
$tamanioDoc = $_FILES['userfile']['size'];

//100 Kb máximo
if (!(strpos($tipoDoc, "pdf")  && ($tamanioDoc < 100000))) 
	echo "La extensión o el tamaño de los archivos no es correcta.";
else{
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $ruta.$nombreDoc))
		echo "El archivo ha sido cargado correctamente.";
	else
		echo "Ocurrió algún error al subir el documento. No pudo guardarse.";
	
	$subida=1;}

if($subida==1){

	$maxID=maximo("idUsuario", "usuarioSUS")+1;
	$valores = $maxID.",'".$folio."','SUS','".$nombreDoc."',".$ruta."',0,'".$tipoDoc."',3,".$_SESSION['idUsuario'].",now(),1";
	$insertar = insertar('archivoDigital', $valores);	
if ( $actualizar[0] == 0 )
	echo $actualizar[1];
}
?>