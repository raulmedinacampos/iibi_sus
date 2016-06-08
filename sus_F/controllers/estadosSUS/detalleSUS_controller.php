<?php
session_start();

$folio = (isset($_POST['folio'])) ? $_POST['folio'] : "";
$columnas = "*, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fechaS, DATE_FORMAT(fechaVerific,'%d/%m/%Y') as fechaV, left(idTipoServicio,1) as tipo";

$solicitud = seleccionar($columnas,"servicioSUS","folio = '".$folio."'");
$empleado = seleccionar('*','empleado,usuarioSUS',"empleado.idEmpleado=usuarioSUS.idEmpleado and usuarioSUS.idUsuario=".$solicitud['idUSolicitante']);
if($empleado['idUsuAutoriza']!=0)
	$responsable = seleccionar('*','empleado',"idEmpleado=".$empleado['idUsuAutoriza']);
else 
	$responsable = seleccionar('*','empleado',"idEmpleado=".$solicitud['idUSolicitante']);

$condicion= 'cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado = usuarioSUS.idEmpleado and usuarioSUS.idUsuario = '.$solicitud['idUSolicitante'];
$area = seleccionar('area','cArea,puesto,usuarioSUS',$condicion);

$estado = seleccionar('estatus','cEstatusSUS','idEstatusSUS='.$solicitud['estatus']);

$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
$nomResponsable = ($responsable) ? $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'] : "";

switch( $solicitud['tipo'] ) {
	case 1: $titulo = 'Servicios diversos';break;
	case 2: $titulo = 'Servicio de correspondencia';break;	
	case 3: $titulo = 'Mantenimiento a equipo, mobiliario y vehículos';	break;	
	case 4: $titulo = 'Reproducción y engargolado';	break;	
	case 5: $titulo = 'Transporte';	break;	
	case 6: $titulo = 'Servicio a inmueble';break;	
	case 7: $titulo = 'Vigilancia';	break;	
	default: $titulo = 'Otros servicios';break;
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