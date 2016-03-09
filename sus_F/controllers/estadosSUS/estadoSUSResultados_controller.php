<?php
require 'inc/herramientas.inc.php' ;

session_start();
	
$fechaI = (isset($_POST['fechaInicial']))  ? addslashes($_POST['fechaInicial']) : '';
$fechaF = (isset($_POST['fechaFinal']))  ? addslashes($_POST['fechaFinal']) : '';
$tipo  	= (isset($_POST['tipoServicio']))  ? addslashes($_POST['tipoServicio']) : '';
$estado = (isset($_POST['estado']))  ? addslashes($_POST['estado']) : '';

$columnas = "folio, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fecha, idUSolicitante, 
			servicio, descripcion, cEstatusSUS.estatus, servicioSUS.estatus as estado";


$tablas = "servicioSUS, cEstatusSUS, cTipoServicio";

if ( $_SESSION['tipoUsuario'] == 1 ) 
	$condicion= "idUSolicitante=".$_SESSION['idUsuario']." and servicioSUS.estatus<11";

if ( $_SESSION['tipoUsuario'] == 3|| $_SESSION['tipoUsuario'] == 5|| $_SESSION['tipoUsuario'] == 6) 
	$condicion= "servicioSUS.estatus<12 ";

if($fechaI!=''){
	$fechaI = normaFecha($fechaI);
	$condicion 	.= " and fechaSolicitud >= '".$fechaI."'";}
	
if($fechaF!=''){
	$fechaF = normaFecha($fechaF);
	$condicion 	.= " and fechaSolicitud <= '".$fechaF."'";}

if ($tipo!='')
	$condicion 	.= " and servicioSUS.idTipoServicio like '".$tipo."%' ";

if($estado!=''){	
	if($estado!=12)
		$condicion 	.= " and servicioSUS.estatus = ".$estado;
	else
		$condicion 	.= " and servicioSUS.visible = 0";}

$condicion 		.= " and cEstatusSUS.idEstatusSUS = servicioSUS.estatus
						  and servicioSUS.idTipoServicio = cTipoServicio.idTipoServicio
						  order by consecutivo asc";

$datos = seleccionarTodoSM($columnas,$tablas,$condicion);

$datos_aux = array();
$aux = array();

if($row = mysqli_fetch_array($datos[1])){
while ( $row = mysqli_fetch_array($datos[1]) ) {
	$datos_aux['idUSolicitante'] = $row['idUSolicitante'];
	$datos_aux['folio'] = $row['folio'];
	$datos_aux['fecha'] = $row['fecha'];
	$datos_aux['servicio'] = $row['servicio'];
	$datos_aux['descripcion'] = $row['descripcion'];
	$datos_aux['estatus'] = $row['estatus'];
	
	switch ( $_SESSION['tipoUsuario'].$row['estado'] ){
					
		case 110://Terminada
			$datos_aux['acciones'] = '<input type="button" value="Evaluar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-evaluar">';//Evaluar(11)
			break;
			
		case 31://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-validar">'; //Validar(8)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-cancelar">'; //Cancelar(9)
			break;
		
		case 38://En proceso
			$datos_aux['acciones'] = '<input type="button" value="Terminar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-terminar">'; //Terminar(10)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-cancelar">'; //Cancelar(9)
			break;
			
		case 39://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-archivar">'; //Archivar(visible=0)
			break;
					
				case 311://Evaluada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-archivar">'; //Archivar(visible=0)
			break;
			
		case 51://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-validar">'; //Validar(8)
			break;
			
		case 58://En proceso
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-cancelar">'; //Cancelar(9)
			break;
		
		case 59://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn btn-default btn-sm btn-validar">'; //Validar(8)
			break;
			
		default: // 18 - 19 - 111 - 112 - 39 - 310 - 312 - 510 - 511 - 512
			$datos_aux['acciones'] = '';
			break;
		}//switch

$aux[] = $datos_aux;
}//while
	
echo   "<tr><th>Folio</th>
		<th>Fecha</th>
		<th>Tipo</th>
		<th>Estado</th>
		<th>Acción</th>
		<th>&nbsp;</th></tr>";

foreach ( $aux as $dato ) {
	echo "<tr><td><a href='#' data-folio=".$dato['folio'].">".$dato['folio']."</a></td>";
	echo "<td><a href='#' data-folio=".$dato['folio'].">".$dato['fecha']."</a></td>";
	echo "<td><a href='#' data-folio=".$dato['folio'].">".$dato['servicio']."</a></td>";
	echo "<td>".$dato['estatus']."</td>";
	echo "<td>".$dato['acciones']."</td>";
	echo '<td><button class="btn btn-sm btn-info btn-pdf" data-folio="'.$dato['folio'].'">PDF</button></td></tr>';}
}else
	
echo "<tr><th colspan=5>No se encontraron coincidencias</th></tr>";
	
	
?>