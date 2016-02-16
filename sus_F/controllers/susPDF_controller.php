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
$html .= '<table class="servicio servicio-1">';
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

$html .= '<br /><br />';

$html .= '<table>';
$html .= '<tr>';
$html .= '<td>DESCRIPCIÓN DEL SERVICIO (Especificar claramente fecha y hora del servicio requerido)</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<br />';

$html .= '<div class="firma firma1">';
$html .= '<p>VO. BO. DE CONFIRMACIÓN DE REQUISITOS</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA<br />RESPONSABLE DE SERVICIOS</p>';
$html .= '</div>';

$html .= '<div class="firma firma2">';
$html .= '<p>REALIZÓ</p>';
$html .= '<p class="nombre">NOMBRE Y FIRMA</p>';
$html .= '</div>';

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