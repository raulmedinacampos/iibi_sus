<?php
session_start();

$dep = array();
$where = (isset($_GET['q'])) ? $_GET['q'] : "";

$condicion = "estatus > 0 and idEmpleado not in (select idEmpleado from usuarioSUS where estatus = 1) ORDER BY apellidoP,apellidoM";

$empleado = seleccionarTodo("idEmpleado, gradoAcad,nombre,apellidoP,apellidoM", "empleado", $condicion);

if ( isset($empleado[1]) && mysqli_num_rows($empleado[1]) > 0 ) {
	while( $row = mysqli_fetch_array($empleado[1]) ) {
		$emp[] = array("id"=>$row[0], "nombre"=>trim($row[1]." ".$row[2]." ".$row[3]." ".$row[4]));
	}
}

echo json_encode($emp);
?>