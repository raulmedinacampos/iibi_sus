<?php
session_start();
require 'inc/herramientas.inc.php';

$folio = (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$folio = str_replace("/", "-", $folio);
$ruta = '/opt/csw/share/www/sus/archivo/_'.date('Y').'/';
$nombreDoc = "SUS".$folio."_".normaArchivo(basename($_FILES['documento']['name']));
$tipoDoc = $_FILES['documento']['type'];
$tamanioDoc = $_FILES['documento']['size'];
$error = $_FILES['documento']['error'];


if($error=!0){
/*	if (move_uploaded_file($_FILES['documento']['tmp_name'], $ruta."SUS_".$folio."_".$nombreDoc))
		$subida = 1;
	else
		echo $_FILES['documento']['error'];
	*/
	
    //3 MB  máximo
	if (!(strpos($tipoDoc, "pdf")  && ($tamanioDoc < 3000000)))
	 	//echo "La extensión o el tamaño de los archivos no es correcta.";
		$subida=0;
		
	else{
		
	 	if (move_uploaded_file($_FILES['documento']['tmp_name'], $ruta.$nombreDoc))
	 		//		echo "El archivo ha sido cargado correctamente.";
	 		$subida=1;
		else
			//echo "Ocurrió algún error al subir el documento. No pudo guardarse.";
			$subida=0;
	}
	
	
	if($subida==1){
		$maxID=maximo("idArchDigital", "archivoDigital")+1;
		$valores = $maxID.",'".$folio."','SUS','".$nombreDoc."','/_".date('Y')."/',0,3,".$_SESSION['idUsuario'].",now(),1";
		$insertar = insertar('archivoDigital', $valores);}	
}//del if error
echo $subida;
?>