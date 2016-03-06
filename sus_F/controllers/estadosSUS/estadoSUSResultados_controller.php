<?php

session_start();
	
//$mes  = (isset($_POST['mes']))  ? addslashes($_POST['mes'])  : date('m');

$fechaI = (isset($_POST['fechaInicial']))  ? addslashes($_POST['fechaInicial']) : '';
$fechaF = (isset($_POST['fechaFinal']))  ? addslashes($_POST['fechaFinal']) : '';
$tipo  	= (isset($_POST['tipoServicio']))  ? addslashes($_POST['tipoServicio']) : '';
$estado = (isset($_POST['estado']))  ? addslashes($_POST['estado']) : '';

if ( $_SESSION['tipoUsuario'] == 1 ) 
	$seleccion = seleccionarTodo("*","servicioSUS","idUSolicitante=".$_SESSION['idUsuario']." and estatus<11");

if ( $_SESSION['tipoUsuario'] == 3|| $_SESSION['tipoUsuario'] == 5|| $_SESSION['tipoUsuario'] == 6) 
	$seleccion = seleccionarTodo("*","servicioSUS"," estatus<12");
		

$columnas = "folio, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fecha, idUSolicitante, 
			servicio, descripcion, cEstatusSUS.estatus, servicioSUS.estatus as estado";

$tablas = "servicioSUS, cEstatusSUS, cTipoServicio";

if ( $_SESSION['tipoUsuario'] == 1 ) 
	$condicion= "idUSolicitante=".$_SESSION['idUsuario']." and servicioSUS.estatus<11";

if ( $_SESSION['tipoUsuario'] == 3 ) 
	$condicion= "servicioSUS.estatus<12 ";

if($fechaI!='')
	$condicion 	.= " and fechaSolicitud >= '".$fechaI."'";
	
if($fechaF!='')	
	$condicion 	.= " and fechaSolicitud <='".$fechaF."'";
	
if ($tipo!='')
	$condicion 	.= " and servicioSUS.idTipoServicio like '".$tipo."%' ";

if($estado!='')	
	$condicion 	.= " and servicioSUS.estatus = ".$estado;

$condicion 		.= " and cEstatusSUS.idEstatusSUS = servicioSUS.estatus
						  and servicioSUS.idTipoServicio = cTipoServicio.idTipoServicio
						  order by consecutivo asc";

$datos = seleccionarTodoSM($columnas,$tablas,$condicion);

$datos_aux = array();
$aux = array();

while ( $row = mysqli_fetch_array($datos[1]) ) {
	$datos_aux['idUSolicitante'] = $row['idUSolicitante'];
	$datos_aux['folio'] = $row['folio'];
	$datos_aux['fecha'] = $row['fecha'];
	$datos_aux['servicio'] = $row['servicio'];
	$datos_aux['descripcion'] = $row['descripcion'];
	$datos_aux['estatus'] = $row['estatus'];
	
	switch ( $_SESSION['tipoUsuario'].$row['estado'] ){
					
		case 110://Terminada
			$datos_aux['acciones'] = '<input type="button" value="Evaluar" onclick="evaluarSUS(\''.$row['folio'].'\')">';//Evaluar(11)
			break;
		
		case 31://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" onclick="validarSUS(\''.$row['folio'].'\')">'; //Validar(8)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">'; //Cancelar(9)
			break;
		
		case 38://En proceso
			$datos_aux['acciones'] = '<input type="button" value="Terminar" onclick="terminarSUS(\''.$row['folio'].'\')">'; //Terminar(10)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">'; //Cancelar(9)
			break;
			
		case 39://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" onclick="archivarSUS(\''.$row['folio'].'\')">'; //Archivar(12)
			break;
					
		case 311://Evaluada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" onclick="archivarSUS(\''.$row['folio'].'\')">'; //Archivar(12)
			break;
			
		case 51://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" onclick="validarSUS(\''.$row['folio'].'\')">'; //Validar(8)
			break;
			
		case 58://En proceso
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">'; //Cancelar(9)
			break;
		
		case 59://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Validar" onclick="validarSUS(\''.$row['folio'].'\')">'; //Validar(8)
			break;
			
		default: // 18 - 19 - 111 - 112 - 39 - 310 - 312 - 510 - 511 - 512
			$datos_aux['acciones'] = '';
			break;
		}//switch

$aux[] = $datos_aux;
}//while
	
$data = array(
		'seleccion' => $seleccion,
		'datos' => $aux);

Flight::render('servicios/estadoSUS', $data);

?>