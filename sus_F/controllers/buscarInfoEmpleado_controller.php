<?php
$id = (isset($_POST['id'])) ? addslashes($_POST['id']) : "";

$empleado = seleccionar("*","empleado","idEmpleado = ".$id);

echo json_encode($empleado);
?>