<?php
session_start();
 
$columnas= "count(*)"
$tablas = "servicioSUS";


$mes = $_POST["mes"];
$anio = $_POST["anio"];

// falta condición de fecha
$condicion = "idTipoServicio like '2%' and month(fechaSolicitud)=".$mes." and year(fechaSolitud)=".$anio;
$correspSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '2%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$correspReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '41' and month(fechaSolicitud)=".$mes." and year(fechaSolitud)=".$anio;
$fotocSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '41' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$fotocReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio ='42' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$engarSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '42' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$engarReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio between 32 and 34 and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoEqSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio between 32 and 34 and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoEqReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '6%' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoInmSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '6%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoInmReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = 31 and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$mtoVehiSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = 31 and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$mtoVehiReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '5%' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$transpSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '5%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$transpReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '11' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$limpSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '11' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$limpReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '71' and month(fechaSolicitud)=".$mes." and year(fechaSolicitud)=".$anio;
$segSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '71' and and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio;
$segReal= seleccionar($columnas, $tablas, $condicion);

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
		'correspSol'  	=> $correspSol[0],
		'fotocSol'	  	=> $fotocSol[0],
		'engarSol'	  	=> $engarSol[0], 
		'mtoEqSol'		=> $mtoEqSol[0],
		'mtoInmSol'		=>  $mtoInmSol[0],
		'mtoVehiSol'	=> $mtoVehiSol[0],
		'transpSol'		=> $transpSol[0],
		'limpSol'		=> $limpSol[0],
		'segSol'		=> $segSol[0],
		
		'correspReal' 	=> $correspReal[0],
		'fotocReal'	  	=> $fotocReal[0],
		'engarReal'	  	=> $engarReal[0],
		'mtoEqReal'		=> $mtoEqReal[0],
		'mtoInmReal'	=>  $mtoInmReal[0],
		'mtoVehReal'	=> $mtoVehiReal[0],
		'transpReal'	=> $transpReal[0],
		'limpReal'		=> $limpReal[0],
		'segReal'		=> $segReal[0],
		
		'totalR' 		=> $totalR[0],
		'totalS' 		=> $totalS[0],
		'sg' 			=> $sg[0],
		'sadm' 			=> $sadm[0],
);


?>