<?php

session_start();
	
/*Tipo usuario
 * 
 * 1 - Usuario
 * 3 - SG 
 * 5 - SA
 * 6 - Auditor este no hace nada mas que mirar el estado de las sus y el detalle
 Los demás perfiles se habilitarán luego*/

/*Para el arranque del sistema se usarA?n sAllo
 * Solicitada						(1)
 * En proceso						(8)
 * Cancelada						(9)
 * Terminada. Para eva usuario		(10)
 * Evaluada							(11)
 * Archivada						(12) */


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

$condicion = $condicion." and cEstatusSUS.idEstatusSUS = servicioSUS.estatus
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
					
/*		case 11://Solicitada
			/* Modificar(0)
			 * Cancelar (9)*//*
			break;
		*/			
		case 110://Terminada
			$datos_aux['acciones'] = '<input type="button" value="Evaluar" data-id="'.$row['folio'].'" class="btn-evaluar">';//Evaluar(11)
			break;
		
		case 31://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn-validar">'; //Validar(8)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn-cancelar">'; //Cancelar(9)
			break;
		
		case 38://En proceso
			$datos_aux['acciones'] = '<input type="button" value="Terminar" data-id="'.$row['folio'].'" class="btn-terminar">'; //Terminar(10)
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn-cancelar">'; //Cancelar(9)
			break;
			
		case 39://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" data-id="'.$row['folio'].'" class="btn-archivar">'; //Archivar(12)
			break;
					
		case 311://Evaluada
			$datos_aux['acciones'] = '<input type="button" value="Archivar" data-id="'.$row['folio'].'" class="btn-archivar">'; //Archivar(12)
			break;
			
		case 51://Solicitada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn-validar">'; //Validar(8)
			break;
			
		case 58://En proceso
			$datos_aux['acciones'] .= '<input type="button" value="Cancelar" data-id="'.$row['folio'].'" class="btn-cancelar">'; //Cancelar(9)
			break;
		
		case 59://Cancelada
			$datos_aux['acciones'] = '<input type="button" value="Validar" data-id="'.$row['folio'].'" class="btn-validar">'; //Validar(8)
			break;
			
		default: // 18 - 19 - 111 - 112 - 39 - 310 - 312 - 510 - 511 - 512
//			$datos_aux['acciones'] = $_SESSION['tipoUsuario'].$row['estado'];
			$datos_aux['acciones'] = '';
			break;
		}//switch

$aux[] = $datos_aux;
}//while

$mes = array(
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
	
$data = array(
		'seleccion' => $seleccion,
		'mes' => $mes[date('n')],
		'datos' => $aux);

Flight::render('servicios/estadoSUS', $data);

?>