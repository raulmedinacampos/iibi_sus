<?php

$d11	= (isset($_POST['11'])) ? addslashes($_POST['11']) : "1";
$d21	= (isset($_POST['21'])) ? addslashes($_POST['21']) : "1";
$d22	= (isset($_POST['22'])) ? addslashes($_POST['22']) : "1";
$d31	= (isset($_POST['31'])) ? addslashes($_POST['31']) : "1";
$d32	= (isset($_POST['32'])) ? addslashes($_POST['32']) : "1";
$d33	= (isset($_POST['33'])) ? addslashes($_POST['33']) : "1";
$d34	= (isset($_POST['34'])) ? addslashes($_POST['34']) : "1";
$d35	= (isset($_POST['35'])) ? addslashes($_POST['35']) : "1";
$d41	= (isset($_POST['41'])) ? addslashes($_POST['41']) : "1";
$d42	= (isset($_POST['42'])) ? addslashes($_POST['42']) : "1";
$d43	= (isset($_POST['43'])) ? addslashes($_POST['43']) : "1";
$d51	= (isset($_POST['51'])) ? addslashes($_POST['51']) : "1";
$d52	= (isset($_POST['52'])) ? addslashes($_POST['52']) : "1";
$d53	= (isset($_POST['53'])) ? addslashes($_POST['53']) : "1";
$d54	= (isset($_POST['54'])) ? addslashes($_POST['54']) : "1";
$d61	= (isset($_POST['61'])) ? addslashes($_POST['61']) : "1";
$d62	= (isset($_POST['62'])) ? addslashes($_POST['62']) : "1";
$d63	= (isset($_POST['63'])) ? addslashes($_POST['63']) : "1";
$d64	= (isset($_POST['64'])) ? addslashes($_POST['64']) : "1";
$d65	= (isset($_POST['65'])) ? addslashes($_POST['65']) : "1";
$d66	= (isset($_POST['66'])) ? addslashes($_POST['66']) : "1";
$d67	= (isset($_POST['67'])) ? addslashes($_POST['67']) : "1";
$d68	= (isset($_POST['68'])) ? addslashes($_POST['68']) : "1";
$d71	= (isset($_POST['71'])) ? addslashes($_POST['71']) : "1";

$servicios = array (
		array($d11,'11'),	
		array($d21,'21'),	array($d22,'22'),
		array($d31,'31'),	array($d32,'32'),	array($d33,'33'),	array($d34,'34'),	array($d35,'35'),
		array($d41,'41'),	array($d42,'42'),	array($d43,'43'),
		array($d51,'51'),	array($d52,'52'),	array($d53,'53'),	array($d54,'54'),
		array($d61,'61'),	array($d62,'62'),	array($d63,'63'),	array($d64,'64'),
		array($d65,'65'),	array($d66,'66'),	array($d67,'67'),	array($d68,'68'),
		array($d71,'71'));

$longitud = count($servicios);
$actualizacion=0;

for($i=0; $i<$longitud; $i++){
	$actualizar = actualizar('cTipoServicio','duracionEstimada="'.$servicios[$i][0].'"','idTipoServicio="'.$servicios[$i][1].'"');
	if ($actualizar[0] == 1)
		$actualizacion++;
}

echo $actualizacion;
?>