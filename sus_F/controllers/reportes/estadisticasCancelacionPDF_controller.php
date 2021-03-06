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

$fecha = "YEAR(fechaLiberacion) = '".$anio."' and MONTH(fechaLiberacion) = '".$mes."'";

$cUsuario=seleccionar('count(folio)','servicioSUS','estatus = 9 and motivo = "Cancelada por el usuario" and '.$fecha); 
$cPresup=seleccionar('count(folio)','servicioSUS','estatus = 9 and motivo = "Falta de presupuesto" and '.$fecha); 
$cPersonal=seleccionar('count(folio)','servicioSUS','estatus = 9 and motivo = "Falta de personal" and '.$fecha);
$cTiempo=seleccionar('count(folio)','servicioSUS','estatus = 9 and motivo = "Solicitud fuera de tiempo" and '.$fecha);
$cLlenado=seleccionar('count(folio)','servicioSUS','estatus = 9 and motivo = "Inconsistencia al llenar solicitud" and '.$fecha);

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
$html .= '<span class="titulo2">Cancelación de solicitudes por justificación</span>';
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
$html .= '<td>'.$cUsuario[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Falta de presupuesto</td>';
$html .= '<td>'.$cPresup[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Falta de personal</td>';
$html .= '<td>'.$cPersonal[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Solicitud fuera de tiempo</td>';
$html .= '<td>'.$cTiempo[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">Inconsistencia al llenar la solicitud</td>';
$html .= '<td>'.$cLlenado[0].'</td>';
$html .= '</tr>';
$html .= '<tr>';

$total = (int)$cLlenado[0]+(int)$cPersonal[0]+(int)$cPresup[0]+(int)$cUsuario[0];
$html .= '<td class="izq">Total de servicios cancelados</td>';
$html .= '<td>'.$total.'</td>';
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