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
$header .= '<p><strong>INFORME MENSUAL DE SERVICIOS</strong></p></td>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$footer = '<p class="footer">F01 PSG Rev. 1</p>';

$html .= '<p class="mes">MES: </p>';

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
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>2</td>';
$html .= '<td class="izq">FOTOCOPIADO</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>3</td>';
$html .= '<td class="izq">ENGARGOLADO Y/O ENMICADO</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>4</td>';
$html .= '<td class="izq">MANTENIMIENTO A EQUIPO</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>5</td>';
$html .= '<td class="izq">MANTENIMIENTO A INMUEBLE</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>6</td>';
$html .= '<td class="izq">MANTENIMIENTO A VEHÍCULOS</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>7</td>';
$html .= '<td class="izq">TRANSPORTE</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>8</td>';
$html .= '<td class="izq">LIMPIEZA</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>9</td>';
$html .= '<td class="izq">SEGURIDAD</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
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
$html .= '<td>0</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS SOLICITADOS</td>';
$html .= '<td>0</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS PROGRAMADOS REALIZADOS<br />(MANTENIMIENTO, SEGURIDAD Y LIMPIEZA)</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SERVICIOS PROGRAMADOS NO REALIZADOS<br />(MANTENIMIENTO, SEGURIDAD Y LIMPIEZA)</td>';
$html .= '<td></td>';
$html .= '<td></td>';
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
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td class="izq">SALIDA DE BIENES DE ACTIVO FIJO</td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<br />';

$html .= '<p><strong>OBSERVACIONES:</strong></p>';

$html .= '<div class="firma firma1">';
$html .= '<p>ELABORÓ</p>';
$html .= '<p class="nombre">ALEJANDRA OLVERA ORTIZ</p>';
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