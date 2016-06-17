<?php
session_start();

$mes = (isset($_POST['mes'])) ? $_POST['mes'] : "";
$anio = (isset($_POST['anio'])) ? $_POST['anio'] : "";

$nombreMes = array(
		"", 
		"enero",
		"febrero",
		"marzo",
		"abril",
		"mayo",
		"junio",
		"julio",
		"agosto",
		"septiembre",
		"octubre",
		"noviembre",
		"diciembre"
);

$fecha = "YEAR(fechaSolicitud) = '".$anio."' and MONTH(fechaSolicitud) = '".$mes."'";
$mtoEqS  = seleccionar("count(folio)","servicioSUS","idTipoServicio like '3%' and ".$fecha);
$mtoInmS = seleccionar("count(folio)","servicioSUS","idTipoServicio like '6%' and ".$fecha);

$fecha = "YEAR(fechaLiberacion) = '".$anio."' and MONTH(fechaLiberacion) = '".$mes."'";
$mtoEqR  = seleccionar("count(folio)","servicioSUS","idTipoServicio like '3%' and estatus <9 and ".$fecha);
$mtoInmR = seleccionar("count(folio)","servicioSUS","idTipoServicio like '3%' and estatus <9 and ".$fecha);


$header = "";
$footer = "";
$html = "";

$header .= '<div class="header">';
$header .= '<table>';
$header .= '<tr>';
$header .= '<td><img src="images/unam_pdf.jpg" alt="" width="55pt" /></td>';
$header .= '<td><p><strong>Instituto de Investigaciones Bibliotecológicas y de la Información</strong></p>';
$header .= '<p>Secretaría Administrativa</p>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$html .= '<br />';

$html .= '<div class="contenedor">';
$html .= '<p class="titulos">';
$html .= '<span class="titulo1">Reporte para apoyar la evaluación de indicadores</span><br />';
$html .= '<span class="titulo2">Número de mantenimientos realizados</span>';
$html .= '</p>';

$html .= '<br />';

$html .= '<p class="mes">Mes de contabilización: '.$nombreMes[$mes].' / '.$anio.'</p>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th></th>';
$html .= '<th>Solicitados</th>';
$html .= '<th>Realizados</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="der">Mantenimiento a equipos</td>';
$html .= '<td>'.$mtoEqS[0].'</td>';
$html .= '<td>'.$mtoEqR[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="der">Mantenimiento a inmueble</td>';
$html .= '<td>'.$mtoInmS[0].'</td>';
$html .= '<td>'.$mtoInmR[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="der">Total</td>';

$sumS = (int)$mtoEqS[0]+(int)$mtoInmS[0];
$sumR = (int)$mtoEqR[0]+(int)$mtoInmR[0];

$html .= '<td>'.$sumS.'</td>';
$html .= '<td>'.$sumR.'</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '</div>';  // .contenedor

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_SERVER['HTTP_HOST'].'/sus/css/reporte_pdf.css');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stylesheet = curl_exec($ch);
curl_close($ch);

include_once 'inc/mpdf/mpdf.php';
$mpdf = new mPDF("c", "Letter", "", "", 20, 20, 35, 15, 10);

$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>