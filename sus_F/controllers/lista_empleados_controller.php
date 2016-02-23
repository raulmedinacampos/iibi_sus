<?php
session_start();

$dep = array();
$where = (isset($_GET['q'])) ? $_GET['q'] : "";

$empleado = seleccionarTodo("idEmpleado,gradoAcad,nombre,apellidoP,apellidoM", "empleado", "estatus > 0 ORDER BY nombre,apellidoP,apellidoM");

if ( isset($empleado[1]) && mysqli_num_rows($empleado[1]) > 0 ) {
	while( $row = mysqli_fetch_array($empleado[1]) ) {
		//$emp[]['id'] = $row[0];
		//$emp[]['nombre'] = utf8_encode(trim($row[1]." ".$row[2]." ".$row[3]." ".$row[4]));
		$emp[] = array("id"=>$row[0], "nombre"=>trim($row[1]." ".$row[2]." ".$row[3]." ".$row[4]));
	}
}

echo json_encode($emp);
?>