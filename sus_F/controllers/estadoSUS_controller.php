<?php

	session_start();
	
	if ( $_SESSION['tipoUsuario'] == 1 ) {
		$seleccion = seleccionarTodo("*","servicioSUS","idUSolicitante=".$_SESSION['idUsuario']." and estatus<8");
	}
	
	if ( $_SESSION['tipoUsuario'] == 3 ) {
		$seleccion = seleccionarTodo("*","servicioSUS"," estatus<8 and estatus>2");
	}
	
	
	$columnas = "folio, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fecha,
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
		
		switch ( $_SESSION['tipoUsuario'].$row['estado'] ) {
			case 11:
			case 13:
			case 15:
				$datos_aux['acciones'] = 'Modificar<br>';
				$datos_aux['acciones'] .= '<input type="button" value="Cancelar" onclick="cancelarSUS(\''.$row['folio'].'\')">';
				break;
					
			case 110:
				$datos_aux['acciones'] = '<input type="button" value="Evaluar" onclick="evaluarSUS(\''.$row['folio'].'\')">';
				break;
					
			case 21:
				$datos_aux['acciones'] = 'Autorizar<br>'; //daVB(2)
				$datos_aux['acciones'] .= 'No autorizar<br>'; //noDaVb(3)
				$datos_aux['acciones'] .= "Cancelar"; //cancelar(9)
				break;
					
			case 32:
				$datos_aux['acciones'] = 'Solicitar suficiencia<br>presupuestal';
				$datos_aux['acciones'] .= 'No validar<br>';
				$datos_aux['acciones'] .= 'Atender';
				break;
				/*	solicitaSF(4)
				 noValidar(5)
				 Comenzar(8)*/
			case 36: case 58:
				$datos_aux['acciones'] = 'Atender';
				break;
				//	Comenzar(8)
				
			case 37:
			case 54:
			case 58:
				$datos_aux['acciones'] = "Cancelar"; //cancelar(9)
				break;
					
			case 38:
				$datos_aux['acciones'] = "Terminar<br>"; //	terminar(10)
				$datos_aux['acciones'] .= "Cancelar"; //cancelar(9)
				break;
					
			case 311:
				$datos_aux['acciones'] = "Archivar"; //archivar(12)
				//$actualizar = actualizar('servicioSUS','visible = 0','folio = "'.$row['folio'].'"');
				break;
				
			case 44:
				$datos_aux['acciones'] = "Con suficiencia presupuestal<br>";
				$datos_aux['acciones'] .= "Sin suficiencia presupuestal";
					
				/*	darSuf(6)
				 negarSuf(7)*/
				break;
			case 55:
				$datos_aux['acciones'] = 'Validar'; //
				break;
				
			case 57:
				$datos_aux['acciones'] = 'Con suficiencia prespuestal'; //	darSuf(6)
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