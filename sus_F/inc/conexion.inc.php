<?php
/*IMPORTANTE
	LA COMPARACION DEL WHERE NO ES SENSITIVA, ES DECIR IGNORA MAYÚSCULAS 
    Y MINÚSCULAS*/

$host = "132.248.242.11";
$usuario ="sigedaa";
$contraseña="sigedaa";
//$contraseña="z11%axsus";
$base="sigedaa";

/*Función conectar()

Hace una conexión a una base de datos específicada por las variables globales
'host', 'usuario', 'contraseña' y 'base'.

Si se logró, devuelve el identificador de la conexión, sino, devuelve el error.*/

function conectar(){
	$conexion = mysqli_connect($GLOBALS['host'],$GLOBALS['usuario'],$GLOBALS['contraseña'], $GLOBALS['base']);
	unset ($GLOBALS['host'],$GLOBALS['usuario'],$GLOBALS['contraseña'], $GLOBALS['base']);
	if (!$conexion) {
		$error = 'Error de Conexión (' . mysqli_connect_errno() . ') '
				 . mysqli_connect_error();
		return $error;}
/*	if($conexion)
		echo "<br>conexion: true";
		else
		echo "<br>conexion: false";
*/		
		
	return $conexion;}

	

/*Función conectarCon($base)

Hace una conexión a una base de datos específicada por parámetro.
Utiliza las variables globales 'host', 'usuario' y 'contraseña' para los demás parámetros

Si se logró, devuelve el identificador de la conexión, sino, devuelve el error.*/

function conectarCon($base){
	$conexion = mysqli_connect($GLOBALS['host'],$GLOBALS['usuario'],$GLOBALS['contraseña'], $base);
	unset ($GLOBALS['host'],$GLOBALS['usuario'],$GLOBALS['contraseña'], $GLOBALS['base']);
	
	if (!$conexion) {
		$error = 'Error de Conexión (' . mysqli_connect_errno() . ') '
				 . mysqli_connect_error();
		return $error;}
	return $conexion;}
	

	
/*Función desconectar($conexion)

Desconecta la base de datos a la que hace referencia el identificador pasado por parámetro.
No regresa parámetros*/
	
function desconectar($conexion){	
	$res=mysqli_close($conexion);
/*	echo "<br>Desconexión:";
	if($res)
	 echo "true";
	 else
	 echo "false";
	 */}
?>