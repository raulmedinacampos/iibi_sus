<?php

	session_start();
	
	/*Tipo usuario
	 * 
	 * 1 - Usuario
	 * 3 - SG 
	 * 5 - SA
	 * 6 - Auditor este no hace nada mas que mirar el estado de las sus y el detalle
	 Los dem�s perfiles se habilitar�n luego*/
	
	
	if ( $_SESSION['tipoUsuario'] == 1 ) {
		$seleccion = seleccionarTodo("*","servicioSUS","idUSolicitante=".$_SESSION['idUsuario']." and estatus<8");
	}
	
	if ( $_SESSION['tipoUsuario'] == 3 ) {
		$seleccion = seleccionarTodo("*","servicioSUS"," estatus<8 and estatus>2");
	}
	
	
	$columnas = "folio, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fecha, idUSolicitante, 
				servicio, descripcion, cEstatusSUS.estatus, servicioSUS.estatus as estado";
	
	$tablas = "servicioSUS, cEstatusSUS, cTipoServicio";
	
	if ( $_SESSION['tipoUsuario'] == 1 ) {
		$condicion= "idUSolicitante=".$_SESSION['idUsuario'];
	}
	
	if ( $_SESSION['tipoUsuario'] == 3 ) {
		$condicion= "servicioSUS.estatus<9 ";
	}	
	
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
		
		
		/*Para el arranque del sistema se usar�n s�lo
		 * 
		 * Validada por todos				(6) //en este caso solo ser� aceptada por SG para la fecha de validaci�n
		 * En proceso						(8)
		 * Cancelada						(9)
		 * Terminada. Para eva usuario		(10)
		 * Evaluada							(11)
		 * Archivada						(12) */
		
		switch ( $_SESSION['tipoUsuario'].$row['estado'] ) {
					
			case 11:
				$datos_aux['acciones'] = 'Esperar validaci�n de <br\>Servicios Generales';
				break;
				
			case 110:
				$datos_aux['acciones'] = '<input type="button" value="Evaluar" onclick="evaluarSUS(\''.$row['folio'].'\')">';
				break;
					
				/*	
				 noValidar(5)
				 Comenzar(8)*/
			case 36:
			case 58:
				$datos_aux['acciones'] = 'Atender';
				break;
				//	Comenzar(8)
				
			case 58:
				$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">'; //cancelar(9)
				break;
					
			case 38:
				$datos_aux['acciones'] = "Terminar<br>"; //	terminar(10)
				$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">'; //cancelar(9)
				break;
					
			case 311:
				$datos_aux['acciones'] = "Archivar"; //archivar(12)
				//$actualizar = actualizar('servicioSUS','visible = 0','folio = "'.$row['folio'].'"');
				break;
				
				
			default:
				$datos_aux['acciones'] = $_SESSION['tipoUsuario'].$row['estado'];
				break;
		}
		$aux[] = $datos_aux;
	}
	
	$data = array(
			'seleccion' => $seleccion,
			'datos' => $aux
	);
	
	Flight::render('servicios/estadoSUS', $data);

?>