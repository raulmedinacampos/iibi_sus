<?php

session_start();

$id= (isset($_POST['hNuevaSolicitud'])) ? addslashes($_POST['hNuevaSolicitud']) : "2016-2";


$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Correspondencia"');
if($seleccion[0]!=0)
$corresp = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $corresp = array('s' => '','r' => '','obs' => '');
	
$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Fotocopiado"');
if($seleccion[0]!=0)
$fotocop = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $fotocop = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Engargolado"');
if($seleccion[0]!=0)
$engar = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $engar = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Mantenimiento a equipo"');
if($seleccion[0]!=0)
$mtoEq = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $mtoEq = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Mantenimiento a inmueble"');
if($seleccion[0]!=0)
$mtoInm = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $mtoInm = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Mantenimiento a veh�culos"');
if($seleccion[0]!=0)
$mtoVeh = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $mtoVeh = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Transporte"');
if($seleccion[0]!=0)
$transp = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $transp = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Limpieza"');
if($seleccion[0]!=0)
$limp = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $limp = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Seguridad"');
if($seleccion[0]!=0)
$seg = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $seg = array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Servicios realizados"');
if($seleccion[0]!=0)
$sReal = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $sReal= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Servicios solicitados"');
if($seleccion[0]!=0)
$sSol = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $sSol= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Servicios programados realizados"');
if($seleccion[0]!=0)
$sProgR = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $sProgR= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Servicios programados no realizados"');
if($seleccion[0]!=0)
$sProgNR = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $sProgNR= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Entrada de bienes de activo fijo"');
if($seleccion[0]!=0)
$eActivoF = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else $eActivoF= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2('*','obsInfMesSUS','idInfMes="'.$id.'" and tipoServicio = "Salida de bienes de activo fijo"');
if($seleccion[0]!=0)
$sActivoF = array(
		's' => $seleccion['totalS'],
		'r' => $seleccion['totalR'],
		'obs' => $seleccion['observacion']);
else
$sActivoF= array('s' => '','r' => '','obs' => '');

$seleccion= seleccionarSinMsj2("*,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha",'infMesSUS','idInfMes="'.$id.'"');
if($seleccion[0]!=0)
$infoMes = array(
		'fecha' => $seleccion['fecha'],
		'obsGrales' => $seleccion['obsGrales'],
		'idElabora' => $seleccion['idElabora'],
		'idEnterado' => $seleccion['idEnterado']);
else $infoMes= array('fecha' => '', 'obsGrales' => '','idElabora' => '','idEnterado'=>'');
 

$header = "";
$footer = "";
$html = "";

$header .= '<div class="header">';
$header .= '<table>';
$header .= '<tr>';
$header .= '<td><img src="images/unam_pdf.jpg" alt="" width="55pt" /></td>';
$header .= '<td><p><strong>UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO</strong></p>';
$header .= '<p>SECRETARÍAS Y UNIDADES ADMINISTRATIVAS</p>';
$header .= '<p>SERVICIOS GENERALES</p>';
$header .= '<p><strong>INFORME MENSUAL DE SERVICIOS</strong></p></td>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$footer = '<p class="footer">F01 PSG Rev. 01</p>';

/***************/
$html .= '<p class="mes"></p>';

$html .= '<p class="mes">Fecha:'.$infoMes['fecha'].' </p>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th>LÍNEA</th>';
$html .= '<th>TIPO DE SERVICIO</th>';
$html .= '<th style="width: 12%;">No. SERVICIOS SOLICITADOS</th>';
$html .= '<th style="width: 12%;">No. SERVICIOS REALIZADOS</th>';
$html .= '<th>RESUMEN DETALLE O NOTAS DE APOYO</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>1</td>';
$html .= '<td class="izq">CORRESPONDENCIA</td>';
$html .= '<td>'.$corresp['s'].'</td>';
$html .= '<td>'.$corresp['r'].'</td>';
$html .= '<td>'.$corresp['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>2</td>';
$html .= '<td class="izq">FOTOCOPIADO</td>';
$html .= '<td>'.$fotocop['s'].'</td>';
$html .= '<td>'.$fotocop['r'].'</td>';
$html .= '<td>'.$fotocop['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>3</td>';
$html .= '<td class="izq">ENGARGOLADO Y/O ENMICADO</td>';
$html .= '<td>'.$engar['s'].'</td>';
$html .= '<td>'.$engar['r'].'</td>';
$html .= '<td>'.$engar['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>4</td>';
$html .= '<td class="izq">MANTENIMIENTO A EQUIPO</td>';
$html .= '<td>'.$mtoEq['s'].'</td>';
$html .= '<td>'.$mtoEq['r'].'</td>';
$html .= '<td>'.$mtoEq['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>5</td>';
$html .= '<td class="izq">MANTENIMIENTO A INMUEBLE</td>';
$html .= '<td>'.$mtoInm['s'].'</td>';
$html .= '<td>'.$mtoInm['r'].'</td>';
$html .= '<td>'.$mtoInm['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>6</td>';
$html .= '<td class="izq">MANTENIMIENTO A VEHÍCULOS</td>';
$html .= '<td>'.$mtoVeh['s'].'</td>';
$html .= '<td>'.$mtoVeh['r'].'</td>';
$html .= '<td>'.$mtoVeh['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>7</td>';
$html .= '<td class="izq">TRANSPORTE</td>';
$html .= '<td>'.$transp['s'].'</td>';
$html .= '<td>'.$transp['r'].'</td>';
$html .= '<td>'.$transp['obs'].'</td>'; 
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>8</td>';
$html .= '<td class="izq">LIMPIEZA</td>';
$html .= '<td>'.$limp['s'].'</td>';
$html .= '<td>'.$limp['r'].'</td>';
$html .= '<td>'.$limp['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>9</td>';
$html .= '<td class="izq">SEGURIDAD</td>';
$html .= '<td>'.$seg['s'].'</td>';
$html .= '<td>'.$seg['r'].'</td>';
$html .= '<td>'.$seg['obs'].'</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<br /><br />';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th style="width: 42%;">INFORMACIÓN</th>';
$html .= '<th style="width: 12%;">TOTALES P/INDICADORES</th>';
$html .= '<th>OBSERVACIONES</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS REALIZADOS</td>';
$html .= '<td>'.$sReal['s'].'</td>';
$html .= '<td>'.$sReal['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS SOLICITADOS</td>';
$html .= '<td>'.$sSol['s'].'</td>';
$html .= '<td>'.$sSol['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS PROGRAMADOS REALIZADOS<br />(MANTENIMIENTO, SEGURIDAD Y LIMPIEZA)</td>';
$html .= '<td>'.$sProgR['s'].'</td>';
$html .= '<td>'.$sProgR['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS PROGRAMADOS NO REALIZADOS<br />(MANTENIMIENTO, SEGURIDAD Y LIMPIEZA)</td>';
$html .= '<td>'.$sProgNR['s'].'</td>';
$html .= '<td>'.$sProgNR['obs'].'</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<br /><br />';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th style="width: 42%;">INFORMACIÓN</th>';
$html .= '<th style="width: 12%;">CONTROL DE BIENES</th>';
$html .= '<th>OBSERVACIONES</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">ENTRADA DE BIENES DE ACTIVO FIJO</td>';
$html .= '<td>'.$eActivoF['s'].'</td>';
$html .= '<td>'.$eActivoF['obs'].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SALIDA DE BIENES DE ACTIVO FIJO</td>';
$html .= '<td>'.$sActivoF['s'].'</td>';
$html .= '<td>'.$sActivoF['obs'].'</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<br />';

$html .= '<p><strong>OBSERVACIONES:</strong><br>'.$infoMes['obsGrales'].'</p>';

$html .= '<div class="firma firma1">';
$html .= '<p>ELABORÓ</p>';
$html .= '<p class="nombre">LIC. LUCERO URBINA HERNÁNDEZ</p>';
$html .= '<p>NOMBRE Y FIRMA<br />RESPONSABLE SERVICIOS GENERALES</p>';
$html .= '</div>';

$html .= '<div class="firma firma2">';
$html .= '<p>ENTERADO</p>';
$html .= '<p class="nombre">LIC. AMANDA G. GONZÁLEZ ROBLES SÁNCHEZ</p>';
$html .= '<p>NOMBRE Y FIRMA<br />SERCRETARIO O JEFE DE UNIDAD<br />ADMINISTRATIVA</p>';
$html .= '</div>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_SERVER['HTTP_HOST'].'/sus/css/infoMes_pdf.css');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stylesheet = curl_exec($ch);
curl_close($ch);

include_once 'inc/mpdf/mpdf.php';
$mpdf = new mPDF("c", "Letter", "", "", 20, 20, 35, 15, 10);

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>