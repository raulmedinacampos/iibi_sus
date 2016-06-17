<?php

/*Aunque el script se llama completo hay funciones que faltan implementar como suficiencia presupuestal y visto bueno jefe por lo menos*/

	session_start();
	
	/*Tipo usuario
	 * 
	 * 1 - Usuario
	 * 2 - Autorizador
	 * 3 - SG 
	 * 4 - Presupuesto
	 * 5 - SA 
	 * 6 - Auditor este no hace nada mas que mirar el estado de las sus y el detalle
	 */
	
	
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
		
		
		/*
		 * Haciendose o modificandose 		(0) 
		 * Solicitada para V.B. jefe  		(1)
		 * Con V.B.J. para validar SG 		(2)
		 * Sin C.B.J.                 		(3)
		 * Validada por SG. Para SufPresup  (4)
		 * No validada por SG         		(5)
		 * Con SufPresup Validada por todos (6)
		 * Sin SufPresup                    (7)
		 * En proceso						(8)
		 * Cancelada						(9)
		 * Terminada. Para eva usuario		(10)
		 * Evaluada							(11)
		 * Archivada						(12)
		 * */
		
		
		/*Para el arranque del sistema se usaron s�lo
		 * 
		 * Haci�ndose o modific�ndose		(0)
		 * En proceso						(8)
		 * Cancelada						(9)
		 * Terminada. Para eva usuario		(10)
		 * Evaluada							(11)
		 * Archivada						(12)
		 
		 *
		 *Para que funcionen las dem�s es necesario cambiar los updates 
		 *en la modificaci�n de los estados de cada solicitud
		 */
		
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

/*
//cambiar a estado 0
function Modificar($folio){
$cambio = actualizar ('servicioSUS','estatus = 0','folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud en modificación.";}
	
//estado 1 es hacer solicitud

//cambiar a estado 2
function vistoBueno($folio){
$cambio = actualizar ('servicioSUS','estatus = 2 and fechaAprob=curdate()' ,'folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud con visto bueno del jefe inmediato.";}
	
//cambiar a estado 3
function sinVistoBueno($folio){
$cambio = actualizar ('servicioSUS','estatus = 3 and fechaAprob=curdate()' ,'folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud no autorizada por el jefe inmediato.";}
	
//cambiar a estado 4
function solicitarSP($folio){
$cambio = actualizar ('servicioSUS','estatus = 4 and fechaVerific=curdate() ','folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud verificada por la Secretaría Administrativa, en espera de suficiencia presupuestal.";}
	
//cambiar a estado 5
function noValidarSG($folio, $motivo){
$cambio = actualizar ('servicioSUS','estatus = 5 and motivo="'.$motivo.'" and fechaVerific=curdate() ','folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud no verificada por la Secretaría Administrativa.";}

//cambiar a estado 6
function conSuficiencia($folio){
$cambio = actualizar ('servicioSUS','estatus = 6 ','folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud verificada y con suficiencia presupuestal.";}
	
//cambiar a estado 7
function sinSuficiencia($folio){
$cambio = actualizar ('servicioSUS','estatus = 7 and motivo="Solicitud sin suficiencia presupuestal."','folio = "'.$folio.'"');
if ($cambio[0] == 1)
	echo "Solicitud sin suficiencia presupuestal.";}
	
*/	
	
?>