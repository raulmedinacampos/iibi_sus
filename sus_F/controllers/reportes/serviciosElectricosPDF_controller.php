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
$html .= '<span class="titulo1">Reporte para apoyar la evaluación del indicador</span><br />';
$html .= '<span class="titulo2">Porcentaje de luminarias de bajo impacto instaladas</span>';
$html .= '</p>';

$html .= '<br />';

$html .= '<p class="mes">Mes de contabilización: '.$nombreMes[$mes].' / '.$anio.'</p>';

$html .= '<p class="titulos">Listado de servicios de electricidad</p>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th>Fecha de liberación</th>';
$html .= '<th>Descripción</th>';
$html .= '<th>Observaciones de Servicios Generales</th>';
$html .= '</tr>';

$fecha = "YEAR(fechaLiberación) = '".$anio."' and MONTH(fechaLibercion) = '".$mes."'";
$datos = seleccionarTodo("fechaLiberacion as fechaL ,descripcion,motivo","servicioSUS","idTipoServicio = 65 and". $fecha);

$seleccion=seleccionarTodo("folio,DATE_FORMAT(fechaSolicitud,'%d/%m/%Y'),estado","servicio","idSolicitante=1");
while ( $row = mysqli_fetch_array($datos[1]) ) {
	$html .= '<tr>';
	$html .= '<td>'.$datos['fechaL'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>'.$datos['descipcion'].'</td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td>'.$datos['motivo'].'</td>';
	$html .= '</tr>';
}
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