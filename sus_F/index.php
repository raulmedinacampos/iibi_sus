<?php
require 'flight/Flight.php';
require 'inc/consultas.inc.php';

/* Definición de las rutas */
Flight::route('/', function() {
	$header = array(
			'menu' => 'no'
	);
	
	$data = array(
			'verifica' => (isset($_GET['verifica'])) ? $_GET['verifica'] : ""
	);
	
	Flight::render('template/header', $header);
    Flight::render('login', $data);
	Flight::render('template/footer');
});

Flight::route('POST /verifica/', function() {
	session_start();
	
	$formulario = (isset($_POST['formulario'])) ? $_POST['formulario'] : "";
	
	if ( $formulario == "index" ) {
		$usuario = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";
		$contrasenia = (isset($_POST['contrasenia'])) ? addslashes($_POST['contrasenia']) : "";
		
		$usuario=seleccionarSinMsj("*","usuarioSUS","usuario='".$usuario."' and contrasenia='".$contrasenia."'");
	
		if ( is_array($usuario) && $usuario[0] != null ) {
				
			$_SESSION['tipoUsuario'] = $usuario['tipoUsuario']; 
			$_SESSION['idUsuario']= $usuario['idUsuario'];
			$_SESSION['idEmpleado']=$usuario['idEmpleado'];
			$_SESSION['idUAutoriza']=$usuario['idUsuAutoriza'];
			
			if ( $_SESSION['tipoUsuario'] == 1 ) {
				Flight::redirect('principal');
			} else {
				Flight::redirect('servicios/estado-de-solicitudes');
			}
		} else {
			Flight::redirect('/?verifica=10');
		}
	
	} // si el formulario es index
});

Flight::route('/principal/', function() {
	session_start();
	
	$header['css'][] = 'menu_component';
		
	$header['js'][] = 'menu_modernizr.custom';
	$header['js'][] = 'funciones';
	
	$footer['js'][] = 'menu_cbpTooltipMenu.min';
	$footer['js'][] = 'menu';
	
	Flight::render('template/header', $header);
	Flight::render('principal');
	Flight::render('template/footer', $footer);
});

Flight::route('/sus/', function() {
	session_start();
	
	$empleado = (isset($_SESSION['idEmpleado'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']) : "";
	$responsable = (isset($_SESSION['idUAutoriza'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']) : "";
	$area = (isset($_SESSION['idUAutoriza'])) ? seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado=empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']) : "";
	
	
	$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
	$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];
	
	$data = array(
			'area' => $area,
			'empleado' => $empleado,
			'nomResponsable' => $nomResponsable,
			'nomUsuario' => $nomUsuario
	);
	
	Flight::render('servicios/sus', $data);
});

Flight::route('/guardaSUS/', function() {
	session_start();
	
	require("inc/herramientas.inc.php");
	
	$consecutivo = maxEnAnio('consecutivo','fechaSolicitud','servicioSUS')+1;
	$folio = "$consecutivo/".date('Y');
	
	
	$servicio = $_POST['servicio'];
	
	if(!empty($_POST['nomSol']))
		$nomSol=$_POST['nomSol'];
	else{
		$usuario =  seleccionar('*','persona',"idPersona=".$_SESSION['idPersona']);
		$nomSol= $usuario['gradoAcad']." ".$usuario['nombres']." ".$usuario['apellidoP']." ".$usuario['apellidoM'];}
	
	
	
		if(!empty($_POST['descripcion']))
			$desc=$_POST['descripcion'];
		else
			$desc="Sin descripción del servicio.";
	
		if(!empty($_POST['detalle']))
			$detalle=$_POST['detalle'];
		else
			$detalle="Sin detalle del servicio.";
	
	
		if($servicio == 13 || $servicio == 36 || $servicio == 69)
			$otro=$_POST['otro'];
		else
			$otro=NULL;
	
		$tabla = 'servicioSUS (folio,consecutivo,idTipoServicio,otro,descripcion,detalle,fechaSolicitud,nomSolicitante,idUSolicitante,estatus)';
		$valores = "'".$folio."',".$consecutivo.",".$servicio.",'".$otro."','".$desc."','".$detalle."',now(),'".$nomSol."',".$_SESSION['idUsuario'].",1";
		$insertar=insertar($tabla,$valores);
	
		if($insertar[0]==1){
			echo "<p>Su solicitud fue enviada. Puede darle seguimiento en el apartado \"Estado de solicitudes\"</p>";}
});

Flight::route('/estadoSUS/', function() {
	session_start();
	
	if ( $_SESSION['tipoUsuario'] == 1 ) {
		$seleccion = seleccionarTodo("*","servicioSUS","idUSolicitante=".$_SESSION['idUsuario']." and estatus<8");
	}
	
	if ( $_SESSION['tipoUsuario'] == 3 ) {
		$seleccion = seleccionarTodo("*","servicioSUS"," estatus<8 and estatus>2");
	}
	
	$columnas = "folio, descripcion, idUSolicitante,
				case left(idTipoServicio,1)
					 when 1 then 'Servicios diversos'
					 when 2 then 'Correspondencia'
					 when 3 then 'Mantenimiento a<br>equipo y vehículos'
					 when 4 then 'Reproducción y engargolado'
					 when 5 then 'Transporte'
					 when 6 then 'A inmueble'
					 when 7 then 'Vigilancia'
				end as servicio,
				DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fecha,
				servicioSUS.estatus as estado,
				cEstatusSUS.estatus";
	
	$tablas = "servicioSUS, cEstatusSUS";
	
	if ( $_SESSION['tipoUsuario'] == 1 ) {
		$condicion= "idUSolicitante=".$_SESSION['idUsuario'];
	}
	
	if ( $_SESSION['tipoUsuario'] == 3 ) {
		$condicion= "servicioSUS.estatus<9 ";
	}	
	
	$condicion = $condicion." and cEstatusSUS.idEstatusSUS = servicioSUS.estatus order by consecutivo asc";
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
});

Flight::route('/evaluacion/evaSolicitud/', function() {
	session_start();
	
	$folio = '10/2015';
	
	$empleado = (isset($_SESSION['idEmpleado'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']) : "";
	$responsable = (isset($_SESSION['idUAutoriza'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']) : "";
	$area = seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado=empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']);
	
	$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
	$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];
	
	$columnas = "folio, servicio, descripcion,
			DATE_FORMAT(fechaAprob,'%d/%m/%Y') as fechaA,
			DATE_FORMAT(fechaLiberacion,'%d/%m/%Y') as fechaL";
	
	$tablas = "servicioSUS, cTipoServicio";
	$condicion = "servicioSUS.idTipoServicio = cTipoServicio.idTipoServicio and folio='".$folio."'";
	$seleccion = seleccionarTodo($columnas,$tablas,$condicion);
	
	$data = array(
			'empleado' => $empleado,
			'responsable' => $responsable,
			'area' => $area,
			'nomUsuario' => $nomUsuario,
			'nomResponsable' => $nomResponsable,
			'folio' => $folio,
			'seleccion' => $seleccion
	);
	
	Flight::render('evaluacion/evaSolicitud', $data);
});

Flight::route('/reportes/infoMes/', function() {
	Flight::render('reportes/infoMes');
});

Flight::route('/salir/', function() {
	session_start();

	$_SESSION = array();
	session_destroy();
	session_unset();

	Flight::redirect('/');
});

Flight::start();
?>
