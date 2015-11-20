<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<?php
session_start();
require("../inc/consultas.inc.php");
require("../inc/herramientas.inc.php");

$folio = $_POST['folio']; 
if(!empty($_POST['obsEva']))
	$obsEva=$_POST['obsEva'];
else
	$obsEva="Sin observaciones al servicio.";

if(!empty($_POST['evaluacion']))
	$evaluacion=$_POST['evaluacion'];
else
	$evaluacion='B';
$valores = 'obsEva="'.$obsEva.'", evaluacion="'.$evaluacion.'", estatus = 11';
echo $folio." - ".$valores;

$actualizar = actualizar('servicioSUS',$valores,'folio = "'.$folio.'"');



if($actualizar[0]==1)
	echo "<p>Evaluacion realizada</p>";
else
	echo "<p>No se hizo evalacion</p>";
?>