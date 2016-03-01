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

$datos = seleccionarTodo("*","serviciosSUS","1 ORDER BY consecutivo, folio");

$header = "";
$footer = "";
$html = "";

$header .= '<div class="header">';
$header .= '<table>';
$header .= '<tr>';
$header .= '<td><img src="images/unam_pdf.jpg" alt="" width="55pt" /></td>';
$header .= '<td><p><strong>Instituto de Investigaciones Bibliotecológicas y de la Información</strong></p>';
$header .= '<p>Secretaría Administrativa</p>';
$header .= '<p>Servicios Generales</p>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$html .= '<br />';

$html .= '<div class="contenedor">';
$html .= '<p class="titulos">';
$html .= '<span class="titulo2">Estadísticos de cancelación de solicitudes por justificación</span>';
$html .= '</p>';

$html .= '<br />';

$html .= '<p class="mes">Mes de contabilización: '.$nombreMes[$mes].' / '.$anio.'</p>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th>Justificación</th>';
$html .= '<th>Número de servicios cancelados</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Cancelada por el usuario</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Falta de presupuesto</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Falta de personal</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Inconsistencia al llenar la solicitud</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Total de servicios cancelados</td>';
$html .= '<td></td>';
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