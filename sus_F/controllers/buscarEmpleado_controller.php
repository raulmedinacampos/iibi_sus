<?php
$nombre = (isset($_POST['nombre'])) ? addslashes($_POST['nombre']) : "";
$apPaterno = (isset($_POST['apPaterno'])) ? addslashes($_POST['apPaterno']) : "";
$apMaterno = (isset($_POST['apMaterno'])) ? addslashes($_POST['apMaterno']) : "";

$respuesta['encontrado'] = 0;
$respuesta['datos'] = "";

$empleado = seleccionarTodo("*","empleado","1 ORDER BY nombre, apellidoP, apellidoM");

if ( mysqli_num_rows($empleado[1]) > 0 ) {
	$respuesta['encontrado'] = 1;
	while ( $row = mysqli_fetch_array($empleado[1]) ) {
		$respuesta['datos'] .= '<div class="radio"><label><input type="radio" id="rdb_'.$row['idEmpleado'].'" name="rdbUsuario" data-id="'.$row['idEmpleado'].'" />';
		$respuesta['datos'] .= trim($row['gradoAcad']." ".$row['nombre']." ".$row['apellidoP']." ".$row['apellidoM']);
		$respuesta['datos'] .= '</label></div>';
		$respuesta['datos'] .= '<div class="radio detalle">';
		$respuesta['datos'] .= 'RFC: '.$row['RFC'].'<br />';
		$respuesta['datos'] .= 'Número de trabajador: '.$row['noTrabajador'];
		$respuesta['datos'] .= '</div>';
	}
}

echo json_encode($respuesta);
?>