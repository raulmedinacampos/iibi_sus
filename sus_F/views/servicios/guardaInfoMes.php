<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<?php
session_start();
require("../inc/consultas.inc.php");
require("../inc/herramientas.inc.php");

if(!empty($_POST['obsCorresp']))
	$obsCorresp=$_POST['obsCorresp'];
else
	$obsCorresp="";

if(!empty($_POST['obsRepro']))
	$obsRepro=$_POST['obsFepro'];
else
	$obsRepro="";

if(!empty($_POST['obsEngar']))
	$obsEngar=$_POST['obsEngar'];
else
	$obsEngar="";

if(!empty($_POST['obsMtoEq']))
	$obsMtoEq=$_POST['obsMtoEq'];
else
	$obsMtoEq="";

if(!empty($_POST['obsMtoInm']))
	$obsMtoInm=$_POST['obsMtoInm'];
else
	$obsMotInm="";

if(!empty($_POST['obsMtoVeh']))
	$obsMtoVeh=$_POST['obsMtoVeh'];
else
	$obsMtoVeh="";

if(!empty($_POST['obsTransp']))
	$obsTransp=$_POST['obsTransp'];
else
	$obsTransp="";

if(!empty($_POST['obsLimp']))
	$obsLimp=$_POST['obsLimp'];
else
	$obsLimp="";

if(!empty($_POST['obsSeg']))
	$obsSeg=$_POST['obsSeg'];
else
	$obsSeg="";

if(!empty($_POST['progHechos']))
	$progHechos=$_POST['progHechos'];
else
	$progHechos=0;

if(!empty($_POST['obsProgH']))
	$obsProgH=$_POST['obsProgH'];
else
	$obsProgH="";

if(!empty($_POST['progSinHacer']))
	$progSinHacer=$_POST['progSinHacer'];
else
	$progSinHacer="";

if(!empty($_POST['obsProgSinH']))
	$obsProgSinH=$_POST['obsProgSinH'];
else
	$obsProgSinH="";

if(!empty($_POST['entradaB']))
	$entradaB=$_POST['entradaB'];
else
	$entradaB=0;

if(!empty($_POST['obsEntradaB']))
	$obsEntradaB=$_POST['obsEntradaB'];
else
	$obsEntradaB="";

if(!empty($_POST['salidaB']))
	$salidaB=$_POST['salidaB'];
else
	$salidaB=0;

if(!empty($_POST['obsSalidaB']))
	$obsSalidaB=$_POST['obsSalidaB'];
else
	$obsSalidaB="";

if(!empty($_POST['obsGrales']))
	$obsGrales=$_POST['obsGrales'];
else
	$obsGrales="";

if(!empty($_POST['idElabora']))
	$idElabora=$_POST['idElabora'];
else
	$idElabora=0;

if(!empty($_POST['idEnterado']))
	$idEnterado=$_POST['idEnterado'];
else
	$idEnterado=0;

$tabla = 'informeMesSUS (fecha,obsCorresp, obsRepro, obsEngar, obsMtoEq, obsMtoImn, obsMtoVeh,obsTransp,obsLimp,obsSeg,progHechos,obsProgH,progSinHacer,obsProgSinH,entradaB,obsEntradaB,salidaB,obsSalidaB,obsGrales,idElabora,idEnterado,estatus)';
$valores = 'curdate(),"'.$obsCorresp.'","'.$obsRepro.'","'.$obsEngar.'","'.$obsMtoEq.'","'.$obsMtoImn.'","'.$obsMtoVeh.'","'.$obsTransp.'","'.$obsLimp.'","'.$obsSeg.'",'.$progHechos.',"'.$obsProgH.'",'.$progSinHacer.',"'.$obsProgSinH.'",'.$entradaB.',"'.$obsEntradaB.'",'.$salidaB.',"'.$obsSalidaB.'","'.$obsGrales.'",'.$idElabora.','.$idEnterado.',1';

$insertar=insertar($tabla,$valores);

if($insertar[0]==1){
	echo "<p>Su solicitud fue enviada. Puede darle seguimiento en el apartado \"Estado de solicitudes\"</p>";}
?>