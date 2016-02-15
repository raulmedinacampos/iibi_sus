<?php
/*Cancela solicitud es idéntica a evaSolicitud, se puede usar el mismo controlador?*/
/*Falta la vista de cancelar solicitud
 * 
 * Donde se verán los datos de la solicitud más un recuadro donde se debe poner la razón para la cancelación.
 * 
 * */

session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$empleado = (isset($_SESSION['idEmpleado'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']) : "";
$responsable = (isset($_SESSION['idUAutoriza'])) ? seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']) : "";
$area = (isset($_SESSION['idUAutoriza'])) ? seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado=empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']) : "";

$nomUsuario = ($empleado) ? $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'] : "";
$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];

$columnas = "folio, servicio, descripcion,
			DATE_FORMAT(fechaVerific,'%d/%m/%Y') as fechaV,
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
?>