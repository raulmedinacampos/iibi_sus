<?php
session_start();

$tablas = "servicioSUS";
$columnas= "count(*)";
 
$mes = (isset($_POST['mes'])) ? addslashes($_POST['mes']) : "";
$anio = (isset($_POST['anio'])) ? addslashes($_POST['anio']) : "";

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
		'correspS'  => $correspS,
		'fotocS'	=> $fotocS,
		'engarS'	=> $engarS, 
		'mtoEqS'	=> $mtoEqS,
		'mtoInmS'	=>  $mtoInmS,
		'mtoVehiS'	=> $mtoVehiS,
		'transpS'	=> $transpS,
		'limpS'		=> $limpS,
		'segS'		=> $segS,
		
		'correspR' 	=> $correspR,
		'fotocR'	=> $fotocR,
		'engarR'	=> $engarR,
		'mtoEqR'	=> $mtoEqR,
		'mtoInmR'	=>  $mtoInmR,
		'mtoVehR'	=> $mtoVehiR,
		'transpR'	=> $transpR,
		'limpR'		=> $limpR,
		'segR'		=> $segR,
		
		'totalR' 	=> $totalR,
		'totalS' 	=> $totalS,
		'sg' 		=> $sg,
		'sadm' 		=> $sadm,
);

echo json_encode($data);
?>