<?php
session_start();

$anio=(isset($_POST['anio'])) ? addslashes($_POST['anio']) : "";
$mes=(isset($_POST['mes'])) ? addslashes($_POST['mes']) : "";

$obsCorresp = (isset($_POST['obsCorresp'])) ? addslashes($_POST['obsCorresp']) : "";
$obsFotoc = (isset($_POST['obsFotoc'])) ? addslashes($_POST['obsFotoc']) : "";
$obsEngar = (isset($_POST['obsEngar'])) ? addslashes($_POST['obsEngar']) : "";
$obsMtoEq = (isset($_POST['obsMtoEq'])) ? addslashes($_POST['obsMtoEq']) : "";
$obsMtoInm = (isset($_POST['obsMtoInm'])) ? addslashes($_POST['obsMtoInm']) : "";
$obsMtoVeh = (isset($_POST['obsMtoVeh'])) ? addslashes($_POST['obsMtoVeh']) : "";
$obsTransp = (isset($_POST['obsTransp'])) ? addslashes($_POST['obsTransp']) : "";
$obsLimp = (isset($_POST['obsLimp'])) ? addslashes($_POST['obsLimp']) : "";
$obsSeg = (isset($_POST['obsSeg'])) ? addslashes($_POST['obsSeg']) : "";

$hCorrespS = (isset($_POST['hCorrespS'])) ? addslashes($_POST['hCorrespS']) : "";
$hFotocS = (isset($_POST['hFotocS'])) ? addslashes($_POST['hFotocS']) : "";
$hEngarS = (isset($_POST['hEngarS'])) ? addslashes($_POST['hEngarS']) : "";
$hMtoEqS = (isset($_POST['hMtoEqS'])) ? addslashes($_POST['hMtoEqS']) : "";
$hMtoInmS = (isset($_POST['hMtoInmS'])) ? addslashes($_POST['hMtoInmS']) : "";
$hMtoVehS = (isset($_POST['hMtoVehS'])) ? addslashes($_POST['hMtoVehS']) : "";
$hTranspS = (isset($_POST['hTranspS'])) ? addslashes($_POST['hTranspS']) : "";
$hLimpS = (isset($_POST['hLimpS'])) ? addslashes($_POST['hLimpS']) : "";
$hSegS = (isset($_POST['hSegS'])) ? addslashes($_POST['hSegS']) : "";

$hCorrespR = (isset($_POST['hCorrespR'])) ? addslashes($_POST['hCorrespR']) : "";
$hFotocR = (isset($_POST['hFotocR'])) ? addslashes($_POST['hFotocR']) : "";
$hEngarR = (isset($_POST['hEngarR'])) ? addslashes($_POST['hEngarR']) : "";
$hMtoEqR = (isset($_POST['hMtoEqR'])) ? addslashes($_POST['hMtoEqR']) : "";
$hMtoInmR = (isset($_POST['hMtoInmR'])) ? addslashes($_POST['hMtoInmR']) : "";
$hMtoVehR = (isset($_POST['hMtoVehR'])) ? addslashes($_POST['hMtoVehR']) : "";
$hTranspR = (isset($_POST['hTranspR'])) ? addslashes($_POST['hTranspR']) : "";
$hLimpR = (isset($_POST['hLimpR'])) ? addslashes($_POST['hLimpR']) : "";
$hSegR = (isset($_POST['hSegR'])) ? addslashes($_POST['hSegR']) : "";

$hTotalS = (isset($_POST['hTotalS'])) ? addslashes($_POST['hTotalS']) : "";
$hTotalR = (isset($_POST['hTotalR'])) ? addslashes($_POST['hTotalR']) : "";

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

$valores = "'".date('Y')."-".date('m')."',now(),'".$obsGrales."',".$_SESSION['idUsuario'].",0,NULL,1";
$infMes = insertar("infMesSUS", $valores);		

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Correspondencia','".$obsCorresp."',".$hCorrespS.",".$hCorrespR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Fotocopiado','".$obsFotoc."',".$hFotocR.",".$hFotocR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Engargolado','".$obsEngar."',".$hEngarS.",".$hEngarR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Mantenimiento a equipo','".$obsMtoEq."',".$hMtoEqS.",".$hMtoEqR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Mantenimiento a inmueble','".$obsMtoInm."',".$hMtoInmS.",".$hMtoInmR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Mantenimiento a veh�culos','".$obsMtoVeh."',".$hMtoVehS.",".$hMtoVehR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Transporte','".$obsTransp."',".$hTranspS.",".$hTranspR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Limpieza','".$obsLimp."',".$hLimpS.",".$hLimpR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Seguridad','".$obsSeg."',".$hSegS.",".$hSegR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);


$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Servicios realizados','".$obsTotalR."',0,".$hTotalR.",'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Servicios solicitados','".$obsTotalS."',".$hTotalS.",0,'".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Servicios programados realizados','".$obsSerProgR."',0,'".$numSerProgR."','".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Servicios programados no realizados','".$obsSerProgNR."','".$numSerProgNR."','0','".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Entrada de bienes de activo fijo','".$obsEntradaB."','".$entradaBienes."','0','".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

$maxID=maximo("idObservacion", "obsInfMesSUS")+1;
$valores = $maxID.",'Salida de bienes de activo fijo','".$obsSalidaB."','".$salidaBienes."','0','".date('Y')."-".date('m')."'";
$insertar = insertar("obsInfMesSUS", $valores);

if ( $insertar[0] == 1 ) {
} else {
	echo "Ocurió un problema, favor de comunicarse con el adminsitrador.";
}
?>