<?php

session_start();

$folio= (isset($_POST['hNuevaSolicitud'])) ? addslashes($_POST['hNuevaSolicitud']) : "";
$folio = "25/2016";

$responsable = (isset($_SESSION['idUAutoriza'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']) : "";
$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];

$area = (isset($_SESSION['idUAutoriza'])) ? seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado=empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']) : "";
$area = $area['area'];

$columnas="nomSolicitante,idTipoServicio,descripcion, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fechaS, left(idTipoServicio,1) as tipo";
$solicitud=seleccionar($columnas,"servicioSUS","folio = '".$folio."'");

$nomUsuario = $solicitud['nomSolicitante'];
$fechaS = $solicitud['fechaS'];
$grupoServicio = $solicitud['tipo'];
$servicio = $solicitud['idTipoServicio'];
$descripcion = $solicitud['descripcion'];
$left=0;
$top=0;
$top2=0;

if($grupoServicio==1||$grupoServicio==5) //diversos o transporte
	$left = 155;
if($grupoServicio==2)//correspondencia
	$left = ;
if($grupoServicio==3)//mantenimiento
	$left = ;
if($grupoServicio==4||$grupoServicio==7)//reproducción o vigilancia
	$left = ;
if($grupoServicio==6&&$servicio<65)//servicio a inmueble primera columna
	$left = ;
if($grupoServicio==6&&$servicio>64)//servicio a inmueble primera columna
	$left = ;

if($servicio==11) 	//limpieza
	$top = ;
if($servicio==12||$servicio==13)
   	$top= ;			//bocadillos y otro

if($servicio==21)//mensajería
	$top = ;
if($servicio==22)//paqueteria
	$top = ;
if($servicio==23)//otro de correspondencia
	$top = ;

if($servicio==31)//mecanica
	$top = ;
if($servicio==32)//aire
	$top = ;
if($servicio==33)//eq de comp
	$top = ;
if($servicio==34)//equipo
	$top = ;
if($servicio==35||$servicio=36)//inmueble u otro
	$top = ;

if($servicio==41)//fotocopiado
	$top = ;
if($servicio==42)//engargolado
	$top = ;
if($servicio==43)//enmicado
	$top = ;

if($servicio==51){//local pasajeros
	$top = 	;	$top2 = ;}
if($servicio==52){//foraneo pasajeros
	$top = ;	$top2= ;}
if($servicio==53){//local carga
	$top = ;	$top2 = ;}
if($servicio==54){//foraneo carga
	$top = ;	$top2 =;}
	

if($servicio==61||$servicio==65)//albañilería y electricidad
	$top = ;
if($servicio==62||$servicio==66)//carpintería
	$top = ;
if($servicio==63||$servicio==67)//herrería y pintura
	$top = ;
if($servicio==64||$servicio==69)//cerrajería y otro
	$top = ;
if($servicio==71)//vigilancia
	$top = ;

$telefono = "123 456 78";
$header = "";
$footer = "";
$html = "";

$header .= '<div class="header">';
$header .= '<table>';
$header .= '<tr>';
$header .= '<td><img src="images/unam_pdf.jpg" alt="" width="55pt" /></td>';
$header .= '<td><p><strong>UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO</strong></p>';
$header .= '<p>INSTITUTO DE INVESTIGACIONES BIBLIOTECOLÓGICAS Y DE LA INFORMACIÓN</p>';
$header .= '<p>SERVICIOS GENERALES</p>';
$header .= '<p><strong>SOLICITUD ÚNICA DE SERVICIOS</strong></p></td>';
$header .= '<td><img src="images/iibi_pdf.png" alt="" width="50pt" /></td>';
$header .= '</tr>';
$header .= '</table>';
$header .= '</div>';

$footer = '<p class="footer">F01 PSG Rev. 01</p>';

$html .= '<div class="columna-1">';
$html .= '<p>Área solicitante: '.$area.'</p>';
$html .= '<p>Responsable del área solicitante: '.$nomResponsable.' </p>';
$html .= '<p>Nombre del usuario: '.$nomUsuario.'</p>';
$html .= '</div>';
$html .= '<div class="columna-2">';
$html .= '<p>Folio: '.$folio.' </p>';
$html .= '<p>Fecha de solicitud: '.$fechaS.' </p>';
$html .= '<p>Teléfono: '.$telefono.' </p>';
$html .= '</div>';

$html .= '<p class="subtitulo">TIPO DE SERVICIO</p>';
$html .= '<div style="position:absolute; top:'.$top.'pt; left:'.$left.'pt;"><img src="images/palomita.png" alt="" style="width:16pt;" /></div>';
$html .= '<div style="position:absolute; top:'.$top2.'pt; left:'.$left.'pt;"><img src="images/palomita.png" alt="" style="width:16pt;" /></div>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td class="sin-borde" width="24%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>DIVERSOS</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>PRESTAMO DE </td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>* SALAS O AULAS</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>* AUDITORIO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>* EQ. AUDIOVISUAL</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CAFETERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>LIMPIEZA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>OTRO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde" width="24%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>CORRESPONDENCIA</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td height="139.7pt">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>MENSAJERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PAQUETERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>OTRO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde" width="24%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>MANTENIMIENTO</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>MECÁNICA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>REFRIGERACIÓN</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>AIRE ACONDIC.</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>EQ. DE CÓMPUTO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>REPARACIÓN EQ.</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>PLANTA DE LUZ</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>OTRO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde" width="24%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>REPRODUCCIÓN Y ENGARGOLADO</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td height="131.5pt">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>FOTOCOPIADO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>ENGARGOLADO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>OTRO</td>';
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

$html .= '<table>';
$html .= '<tr>';
$html .= '<td class="sin-borde" width="24%">';
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
$html .= '<td class="sin-borde" width="48%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>SERVICIO A INMUEBLES</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>ALBAÑILERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>ELECTRICIDAD</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CARPINTERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>PLOMERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>HERRERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>PINTURA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>CERRAJERÍA</td>';
$html .= '<td class="casilla"></td>';
$html .= '<td>OTRO</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td class="sin-borde" width="24%">';
$html .= '<table class="servicio">';
$html .= '<tr>';
$html .= '<th>VIGILANCIA PARA EVENTOS ESPECIALES</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td height="75.5pt">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>VIGILANCIA</td>';
$html .= '<td class="casilla"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<p class="subtitulo">DESCRIPCIÓN DEL SERVICIO (Especificar claramente fecha y hora del servicio requerido)</p>';
$html .= '<div class="descripcion">'.$descripcion.'</td>';
$html .= '</div>';

$html .= '<br />';

$html .= '<div class="columna-3">';
$html .= '<p>FECHA COMPROMISO DE ENTREGA:</p>';
$html .= '<p class="fecha-liberacion">FECHA DE LIBERACIÓN DEL SERVICIO:</p>';
$html .= '<div class="firma firma1">';
$html .= '<p>VO. BO. DE CONFIRMACIÓN DE REQUISITOS</p>';
$html .= '<p class="nombre">Lic. Lucero Urbina Hdz.<br />RESPONSABLE DE SERVICIOS</p>';
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