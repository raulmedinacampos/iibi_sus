<?php

$mes = (isset($_POST['mes'])) ? addslashes($_POST['mes']) : "";
$anio = (isset($_POST['anio'])) ? addslashes($_POST['anio']) : "";

$columnas= "idInfMes";
$tablas="infMesSUS";
$condicion= "idInfMes = '".$anio."-".$mes."'"; 

$encontrado = seleccionar($columnas, $tablas, $condicion);
if($encontrado=="0")
	echo "0";
else
	echo "1";
	
	?>