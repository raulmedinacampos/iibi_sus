<?php
session_start();
 
$columnas= "count(*)";
$tablas = "servicioSUS";
 
$mes = $_POST["mes"];
$anio = $_POST["anio"];

$condicion = "idTipoServicio like '2%' and month(fechaSolicitud)=".$mes." and year(fechaSolitud)=".$anio;
$correspS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '2%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$correspR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '41' and month(fechaSolicitud)=".$mes." and year(fechaSolitud)=".$anio;
$fotocS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '41' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$fotocR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio ='42' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$engarS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '42' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$engarR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio between 32 and 34 and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoEqS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio between 32 and 34 and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoEqR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '6%' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoInmS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '6%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoInmR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = 31 and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoVehiS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = 31 and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoVehiR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '5%' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$transpS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '5%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$transpR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '11' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$limpS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '11' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$limpR= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '71' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$segS= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '71' and and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$segR= seleccionar($columnas, $tablas, $condicion);

$condicion = "month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$totalS= seleccionar($columnas, $tablas, $condicion);

$condicion = "month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$totalR= seleccionar($columnas, $tablas, $condicion);

$condicion = "empleado.idEmpleado = puesto.idEmpleado and puesto.puesto ='Jefe de área' and  puesto.idArea = 9 and puesto.estatus = 1";
$sg= seleccionar("concat(nombre,' ',apellidoP,' ',apellidoM) as nombre","puesto, empleado", $condicion);

$condicion = "empleado.idEmpleado = puesto.idEmpleado and puesto.puesto ='Secreatario Administrativo' and puesto.idArea = 5 and puesto.estatus = 1";
$sadm= seleccionar("concat(nombre,' ',apellidoP,' ',apellidoM) as nombre","puesto, empleado", $condicion);

/*Las variables que terminan con Sol son las solicitadas, las que terminan con Real son las realizadas*/

$data = array(
		'correspS'  => $correspS[0],
		'fotocS'	=> $fotocS[0],
		'engarS'	=> $engarS[0], 
		'mtoEqS'	=> $mtoEqS[0],
		'mtoInmS'	=>  $mtoInmS[0],
		'mtoVehiS'	=> $mtoVehiS[0],
		'transpS'	=> $transpS[0],
		'limpS'		=> $limpS[0],
		'segS'		=> $segS[0],
		
		'correspR' 	=> $correspR[0],
		'fotocR'	=> $fotocR[0],
		'engarR'	=> $engarR[0],
		'mtoEqR'	=> $mtoEqR[0],
		'mtoInmR'	=>  $mtoInmR[0],
		'mtoVehR'	=> $mtoVehiR[0],
		'transpR'	=> $transpR[0],
		'limpR'		=> $limpR[0],
		'segR'		=> $segR[0],
		
		'totalR' 	=> $totalR[0],
		'totalS' 	=> $totalS[0],
		'sg' 		=> $sg[0],
		'sadm' 		=> $sadm[0],
);

echo json_encode($data);
?>