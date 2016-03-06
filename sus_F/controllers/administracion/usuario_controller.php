<?php
session_start();

$grupo = seleccionarTodo("*","cTipoUsuarioSUS","estatus=1");
$cols	 	= "empleado.idEmpleado,empleado.nombre,apellidoP,apellidoM";
$tablas 	= "empleado,cPuesto,puesto";
$condicion 	= "cPuesto.tipo =  'fun'
				AND cPuesto.nombre = puesto.puesto
				AND empleado.idEmpleado = puesto.idEmpleado";

$autoriza = seleccionarTodo($cols,$tablas,$condicion);



$data = array(
		'grupo' => $grupo,
		'autoriza'=> $autoriza,
);

Flight::render('administracion/alta_usuario', $data);
?>