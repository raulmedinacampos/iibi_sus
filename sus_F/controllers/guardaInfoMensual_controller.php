<?php

$obsCorresp = (isset($_POST['obsCorresp'])) ? addslashes($_POST['obsCorresp']) : "";
$obsFotoc = (isset($_POST['obsFotoc'])) ? addslashes($_POST['obsFotoc']) : "";
$obsEngar = (isset($_POST['obsEngar'])) ? addslashes($_POST['obsEngar']) : "";
$obsMtoEq = (isset($_POST['obsMtoEq'])) ? addslashes($_POST['obsMtoEq']) : "";
$obsMtoInm = (isset($_POST['obsMtoInm'])) ? addslashes($_POST['obsMtoInm']) : "";
$obsMtoVeh = (isset($_POST['obsMtoVeh'])) ? addslashes($_POST['obsMtoVeh']) : "";
$obsTransp = (isset($_POST['obsTransp'])) ? addslashes($_POST['obsTransp']) : "";
$obsLimp = (isset($_POST['obsLimp'])) ? addslashes($_POST['obsLimp']) : "";
$obsSeg = (isset($_POST['obsSeg'])) ? addslashes($_POST['obsSeg']) : "";

$obsTotalR = (isset($_POST['obsTotalR'])) ? addslashes($_POST['obsTotalR']) : "";
$obsTotalS = (isset($_POST['obsTotalS'])) ? addslashes($_POST['obsTotalS']) : "";
$numSerProgR = (isset($_POST['numSerProgR'])) ? addslashes($_POST['numSerProgR']) : "";
$numSerProgNR = (isset($_POST['numSerProgNR'])) ? addslashes($_POST['numSerProgNR']) : "";
$obsSerProgR = (isset($_POST['obsSerProgR'])) ? addslashes($_POST['obsSerProgR']) : "";
$obsSerProgNR = (isset($_POST['obsSerProgNR'])) ? addslashes($_POST['obsSerProgNR']) : "";

$entradaBienes = (isset($_POST['entradaBienes'])) ? addslashes($_POST['entradaBienes']) : "";
$salidaBienes  = (isset($_POST['salidaBienes'])) ? addslashes($_POST['salidaBienes']) : "";
$obsSalidaB = (isset($_POST['obsSalidaB'])) ? addslashes($_POST['obsSalidaB']) : "";
$obsEntradaB = (isset($_POST['obsEntradaB'])) ? addslashes($_POST['obsEntradaB']) : "";
$obsGrales = (isset($_POST['obsGrales'])) ? addslashes($_POST['obsGrales']) : "";





$insertar = insertar($tabla, $valores);

if ( $insertar[0] == 1 ) {
} else {
	echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";
}
?>