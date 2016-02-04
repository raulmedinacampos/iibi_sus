<?php
session_start();

$columnas= "count(*)"
$tablas = "servicioSUS";


$mes = $_POST["mes"];
$anio = $_POST["anio"];

// falta condición de fecha
$condicion = "idTipoServicio like '2%' and month(fechaSolicitud)=".$mes." and year(fechaSolitud)=".$anio." and estatus<12";
$correspSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '2%' and month(fechaLiberacion)=".$mes." and year(fechaLiberacion)=".$anio." and estatus>12";
$correspReal= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '41' and estatus<12";
$fotocSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '42' and estatus<12";
$engarSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '33' and estatus<12";
$mtoEqSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '35' and estatus<12";
$mtoInmSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '31' and estatus<12";
$mtoVehiSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio like '5%' and estatus<12";
$transpSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '11' and estatus<12";
$limpSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "idTipoServicio = '71' and estatus<12";
$segSol= seleccionar($columnas, $tablas, $condicion);

$condicion = "estatus<12";
$totalR= seleccionar($columnas, $tablas, $condicion);

$condicion = "1";
$totalS= seleccionar($columnas, $tablas, $condicion);

$condicion = "empleado.idEmpleado = puesto.idEmpleado and puesto.puesto ='Jefe de área' and  puesto.idArea = 9 and puesto.estatus = 1";
$sg= seleccionar("concat(nombre,' ',apellidoP,' ',apellidoM) as nombre","puesto, empleado", $condicion);

$condicion = "empleado.idEmpleado = puesto.idEmpleado and puesto.puesto ='Secreatario Administrativo' and puesto.idArea = 5 and puesto.estatus = 1";
$sadm= seleccionar("concat(nombre,' ',apellidoP,' ',apellidoM) as nombre","puesto, empleado", $condicion);

/*Las variables que terminan con Sol son las solicitadas, las que terminan con Real son las realizadas*/

$data = array(
		'correspSol'  	=> $correspSol[0],
		'correspReal' 	=> $correspReal[0],
		'fotocSol'	  	=> $fotocSol[0],
		'engarSol'	  	=> $engarSol[0], 
		'mtoEqSol'		=> $mtoEqSol[0],
		'mtoInm' 		=>  $mtoInmSol[0],
		'mtoVehiSol'	=> $mtoVehiSol[0],
		'transpSol'		=> $transpSol[0],
		'limpSol'		=> $limpSol[0],
		'segSol'		=> $segSol[0],
		'totalR' 		=> $totalR[0],
		'totalS' 		=> $totalS[0],
		'sg' 			=> $sg[0],
		'sadm' 			=> $sadm[0],
);


?>