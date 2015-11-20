<?php
/*IMPORTANTE
	LA COMPARACION DEL WHERE NO ES SENSITIVA, ES DECIR IGNORA MAYÚSCULAS 
    Y MINÚSCULAS*/

$host = "localhost";
$usuario ="sus";
$contraseña="z11%axsus";
$base="sus";

function conectar(){
	$conexion = mysqli_connect($GLOBALS['host'],$GLOBALS['usuario'],$GLOBALS['contraseña'], $GLOBALS['base']);
	if (!$conexion) {
		$error = 'Error de Conexión (' . mysqli_connect_errno() . ') '
				 . mysqli_connect_error();
		return $error;}
	return $conexion;}

require("conexion.inc.php");
$conexion = conectar();



 function seleccionar($columnas,$tablas,$condicion){
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso = $GLOBALS['ERROR'];
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta);
		}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0)
			$regreso = mysqli_fetch_array($respuesta);
		else
			echo $GLOBALS['err_select'];}
	return $regreso;}


$sql = "SET AUTOCOMMIT=0";
$resultado = mysqli_query($conexion, $sql);
 
$sql = "BEGIN;";
$resultado = mysqli_query($conexion, $sql);

$sql = "SELECT * FROM primera; ";
$resultado = mysql_query($sql, $dbh);
 
$sql = "INSERT INTO `segunda` (`id`, `descripcion`) VALUES ('', 'Otro
valor');";
$resultado = mysql_query($sql, $dbh);
 
$sql = "INSERT INTO `primera` (`id`, `ripcion`) VALUES (´´, ´Otro valor´);";
$resultado = mysql_query($sql, $dbh);
 
if ($resultado) {
echo 'OK';
echo '';
$sql = "COMMIT";
$resultado = mysql_query($sql, $dbh);
}
else
{
echo 'MAL';
echo '
';
echo 'SE EJECUTA EL ROOLBACK';
echo '
';
 
$sql = "ROLLBACK;";
$resultado = mysql_query($sql, $dbh);
}

 ?>

