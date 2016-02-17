<?php
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
$header .= '<p><strong>SOLICITUD ÚNICA DE SERVICIOS</strong></p></td>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$footer = '<p class="footer">F01 PSG Rev. 1</p>';

$html .= '<div class="columna-1">';
$html .= '<p>ÁREA SOLICITANTE: </p>';
$html .= '<p>RESPONSABLE DEL ÁREA SOLICITANTE: </p>';
$html .= '<p>NOMBRE DEL USUARIO: </p>';
$html .= '</div>';
$html .= '<div class="columna-2">';
$html .= '<p>FOLIO: </p>';
$html .= '<p>FECHA DE SOLICITUD: </p>';
$html .= '<p>TELÉFONO: </p>';
$html .= '</div>';

$html .= '<p><strong>TIPO DE SERVICIO</strong></p>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td class="sin-borde">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>TRANSPORTE</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>LOCAL</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>FORÁNEO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PASAJEROS</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CARGA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>TRANSPORTE</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>LOCAL</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>FORÁNEO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PASAJEROS</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CARGA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>TRANSPORTE</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>LOCAL</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>FORÁNEO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PASAJEROS</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CARGA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>TRANSPORTE</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>LOCAL</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>FORÁNEO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PASAJEROS</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CARGA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<br />';

$html .= '<p class="subtitulo">DESCRIPCIÓN DEL SERVICIO (Especificar claramente fecha y hora del servicio requerido)</p>';
$html .= '<div class="descripcion"><p>DEVOLUCIÓN DE P.I.</p><p>FAVOR DE DEVOLVER UN LIBRO A LA BIBLIOTECA CENTRAL<br />DESPUÉS ENTREGAR PAPELETA CON SELLO DE DEVUELTO A LA BIBLIOTECA DEL IIBI.</p><p>Z675 S3D87</p><p>GRACIAS</p></td>';
$html .= '</div>';

$html .= '<br />';

$html .= '<div class="columna-3">';
$html .= '<p>FECHA COMPROMISO DE ENTREGA:</p>';
$html .= '<p class="fecha-liberacion">FECHA DE LIBERACIÓN DEL SERVICIO:</p>';
$html .= '<div class="firma firma1">';
$html .= '<p>VO. BO. DE CONFIRMACIÓN DE REQUISITOS</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA<br />RESPONSABLE DE SERVICIOS</p>';
$html .= '</div>';  //.firma1

$html .= '<div class="firma firma2">';
$html .= '<p>REALIZÓ</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA</p>';
$html .= '</div>';  //.firma2
$html .= '</div>';  //.columna-3

$html .= '<div class="columna-4">';
$html .= '<p class="titulo">CUANDO EL SERVICIO TENGA UN COSTO Y REQUIERA AUTORIZACIÓN PRESUPUESTAL</p>';
$html .= '<p class="margen-izquierdo">COSTO:</p>';
$html .= '<p class="margen-izquierdo">CON CARGO A:</p>';
$html .= '<div class="firma firma1">';
$html .= '<p>VO. BO. SUFICIENCIA PRESUPUESTAL</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA<br />RESPONSABLE DEL PRESUPUESTO</p>';
$html .= '</div>';  //.firma1

$html .= '<div class="firma firma2">';
$html .= '<p>AUTORIZÓ</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA<br />SECRETARIO O JEFE DE UNIDAD</p>';
$html .= '</div>';  //.firma2
$html .= '</div>';  //.columna-4

$html .= '<br />';

$html .= '<table class="evaluacion">';
$html .= '<tr>';
$html .= '<th>CÓMO CALIFICARÍA EL SERVICIO RECIBIDO</th>';
$html .= '<th>EN LA FECHA COMPROMISO</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td rowspan="2">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>EXCELENTE</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>BUENO</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>REGULAR</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>MALO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="centrado"><br /><br /><br /><br /></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="centrado">NOMBRE Y FIRMA</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<p class="nota">Nota: Es necesario elaborar una solicitud por cada servicio requerido</p>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_SERVER['HTTP_HOST'].'/sus/css/sus_pdf.css');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stylesheet = curl_exec($ch);
curl_close($ch);

include_once 'inc/mpdf/mpdf.php';
$mpdf = new mPDF("c", "Letter", "", "", 20, 20, 38, 15, 10);

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>