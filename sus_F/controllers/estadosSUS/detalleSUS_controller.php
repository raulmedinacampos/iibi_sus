<?php
session_start();

$folio = (isset($_POST['folio'])) ? $_POST['folio'] : "";
$columnas = "*, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fechaS, DATE_FORMAT(fechaAprob,'%d/%m/%Y') as fechaA, left(idTipoServicio,1) as tipo";

$solicitud = seleccionar($columnas,"servicioSUS","folio = '".$folio."'");
$empleado = seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']);
$responsable = seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']);
$area = seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado = empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']);
$estado = seleccionar('estatus','cEstatusSUS','idEstatusSUS='.$solicitud['estatus']);

$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
$nomResponsable = ($responsable) ? $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'] : "";

switch( $solicitud['tipo'] ) {
	case 1: $titulo = 'Servicios diversos';
		break;
	case 2: $titulo = 'Servicio de correspondencia';
		break;	
	case 3: $titulo = 'Mantenimiento a equipo, mobiliario y vehículos';
		break;	
	case 4: $titulo = 'Reproducción y engargolado';
		break;	
	case 5: $titulo = 'Transporte';
		break;	
	case 6: $titulo = 'Servicio a inmueble';
		break;	
	case 7: $titulo = 'Vigilancia';
		break;	
	default: $titulo = 'Otros servicios';
		break;
}

$data = array(
	'folio' => $folio,
	'solicitud' => $solicitud,
	'empleado' => $empleado,
	'area' => $area,
	'estado' => $estado,
	'nomResponsable' => $nomResponsable,
	'nomUsuario' => $nomUsuario,
	'titulo' => $titulo
);

Flight::render('servicios/detalleSUS', $data);
?>