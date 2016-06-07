<?php
require("conexion.inc.php");
$conexion = conectar();

/*IMPORTANTE LA COMPARACION DEL WHERE NO ES SENSITIVA, ES DECIR IGNORA MAYÚSCULAS Y MINÚSCULAS*/


/*errorConsulta no guarda el usuario que hace la consulta, solo guarda "1"
 * 
 * verificar si se puede usar $_SESSION['idUsuario'] en todos los casos
 * */

$ERROR = "[]<br>Ocurrió un error, favor de comunicarse con el administrador del sistema.";
$err_update = "[]<br>No se realizó alguna actualización. Favor de comunicarse con el administrador.";
$err_select = "[]<br>No se encontraron coincidencias.";



/*Funcion error($usuario, $error,$consulta)

Guarda los errores que se generan mediante una $consulta.
No regresa valores*/

function errorConsulta($usuario, $error, $consulta,$sistema){
    //tabla error--> idError, usuario, error, fecha
	$error=str_replace('"',"",$error);
	$consulta=str_replace('"',"",$consulta);
	$valores = 'NULL,'.$_SESSION["idUsuario"].',"'.$error.'","'.$consulta.'",now(),"'.$sistema.'"';
	$consulta="insert into error values (".$valores.")";
	mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion']))
			echo "<br>ErrorConsulta dice:".mysqli_error($GLOBALS['conexion']);}

	

/*Funcion maximo ($columna, $tabla)

- Busca el máximo en la $columna de la $tabla.
  Regresa el valor encontrado. Si la tabla no tiene valores regresa NULL,
  pero funciona con maximo(parametros)+1, que daría 1*/

function maximo ($columna, $tabla){
	$seleccion=seleccionar("max(".$columna.") as max",$tabla,1);
//	echo "<br>----- Valor máximo: ".$seleccion["max"];
	return $seleccion["max"];}


/*Funcion maxEnAnio($columna,$colFecha,$tabla)

- Compara el año actual con el de la columna $colFecha 
  y obtiene el maximo consecutivo en el año actual*/
  
  
  
function maxEnAnio($columna,$colFecha,$tabla){
	$seleccion=seleccionar("max(".$columna.") as maxEnAnio",$tabla,"YEAR(".$colFecha.") = YEAR( NOW())");
	return $seleccion["maxEnAnio"];}


/*Funcion contar ($columna, $tabla)

- Cuenta el número de columnas de la $tabla.
  Regresa el valor encontrado.,
  pero funciona con maximo(parametros)+1, que daría 1*/

function contar($columna, $tabla){
	$seleccion=seleccionar("count(*) as cuenta",$tabla,1);
	return $seleccion["cuenta"];}


	
/*Función seleccionar($columnas,$tablas,$condicion)

- Realiza una selección con los parámetros pasados.
  Ya que no existe sobrecarga de funciones, se puede usar 1
  como último parámetro cuando no sea necesaria la condición.

  Regresa un arreglo con la última respuesta de la consulta.

  Ejemplo:
			$seleccion=seleccionar("*","tabla",1);
			echo "Seleccion:". $seleccion[0]." ".$seleccion[1];*/
	 
 function seleccionar($columnas,$tablas,$condicion){ 
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
	//echo "<br>".$consulta;
	
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso = $GLOBALS['ERROR'];
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");
		//echo $regreso;
		}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0)
			$regreso = mysqli_fetch_array($respuesta);
		else{
			$regreso =0;}}
	return $regreso;}


/*Función seleccionarSinMsj($columnas,$tablas,$condicion)


Falta poner pq se llama sin msj, creo que es sin mensaje de error.

- Realiza una selección con los parámetros pasados.
  Ya que no existe sobrecarga de funciones, se puede usar 1
  como último parámetro cuando no sea necesaria la condición.

  Regresa un arreglo con la última respuesta de la consulta.

  Ejemplo:
			$seleccion=seleccionar("*","tabla",1);
			echo "Seleccion:". $seleccion[0]." ".$seleccion[1];*/
	 
function seleccionarSinMsj($columnas,$tablas,$condicion){
	$regreso = "";
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
//	echo "<br>".$consulta;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso = 0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0)
			$regreso = mysqli_fetch_array($respuesta);
		else
			$regreso=0;}
		
	return $regreso;}




function seleccionarSinMsj2($columnas,$tablas,$condicion){
	$regreso = "";
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso = 0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0)
			$regreso = mysqli_fetch_array($respuesta);
		else
			$regreso = 0;}
		
	return $regreso;}
	
	
/*Función seleccionarTodo($columnas,$tablas,$condicion)

- Realiza una selección con los parámetros pasados.
- De haber un error en la seleccion, lo guarda en la base de datos.

  Regresa un arreglo
  
	Si se realizó arreglo[0] = 1, arreglo[1] = arreglo con las coincidencias.
	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error.

  Esta función se debe ocupar con una estructura while y  mysqli_fetch_array
  Ejemplo:
			$seleccion=seleccionarTodo("*","tabla",1);
			while($row=mysqli_fetch_array($seleccion[1])){
				echo "<br>".$row[1];}	
			
			$seleccion=seleccionarTodo("folio,DATE_FORMAT(fechaSolicitud,'%d/%m/%Y'),estatus","servicio","idSolicitante=1");
			while($row=mysqli_fetch_array($seleccion[1])){
				echo "<br>00".$row['0']." ".$row['1']." ".$row['2'];}*/
			
function seleccionarTodo($columnas,$tablas,$condicion){
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
//	echo "<br>".$consulta;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso[0] = 0;
		$regreso[1] = $GLOBALS['ERROR'];
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");
		echo $regreso[1];
	}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0){
			$regreso[0] = 1;
			$regreso[1] = $respuesta;}
		else{
			$regreso[0]=0;
			$regreso[1] = $GLOBALS['err_select'];}
	}
	return $regreso;}


/*seleccionar todo sin mensaje*/
function seleccionarTodoSM($columnas,$tablas,$condicion){
	$consulta="select ".$columnas." from ".$tablas. " where ".$condicion;
//	echo "<br>".$consulta;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso[0] = 0;
		$regreso[1] = 0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");
	}
	else{
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0){
			$regreso[0] = 1;
			$regreso[1] = $respuesta;}
		else{
			$regreso[0]=0;
			$regreso[1]=0;}
		}
	return $regreso;}




/*Función actualizar($columnas,$tablas,$condicion)

- Realiza una actualización UPDATE sobre los registros que concuerdan
  con la consulta.
- De haber un error en la inserción, lo guarda en la base de datos.

	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error. */

function actualizar($tabla,$valores, $condicion){
	$consulta="update ".$tabla." set ".$valores. " where ".$condicion;
//	echo "<br>".$consulta;
	if(mysqli_query($GLOBALS['conexion'],$consulta)){
	// si se realizó la consulta
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0){
		//Si son diferente de cero las columnas afectadas
			$regreso[0] = 1;
			$regreso[1] = mysqli_affected_rows($GLOBALS['conexion']);}
		else{
			$regreso[0] = 0;
			$regreso[1] = $GLOBALS['err_update'];}
	}
	else{
		$regreso[0] = 0;
		$regreso[1] = mysqli_error($GLOBALS['conexion']);
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");}
	return $regreso;}

	
	
/*Función insertar($tabla,$valores)

- Realiza una inserción INSERT de los datos en la tabla específicada.
- De haber un error en la inserción, lo guarda en la base de datos.

  Regresa un arreglo[1,2]
	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error. */

function insertar($tabla,$valores){
	$consulta="insert into ".$tabla." values (".$valores.")";
//	echo "<br>".$consulta;
	if(mysqli_query($GLOBALS['conexion'],$consulta)){
		$regreso[0] = 1;
		$regreso[1] = mysqli_affected_rows($GLOBALS['conexion']);}
	else{
		$regreso[0] = 0;
		$regreso[1] = mysqli_error($GLOBALS['conexion']);
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");}
	return $regreso;}
	
	
	
/*Función borrar($tabla,$condicion)
  Borra los datos de la $tabla que coinciden con $condicion
  
  De haber un error en la eliminación, lo guarda en la base de datos.

  Regresa un arreglo[1,2]
	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
	Si no         arreglo[0] = 0, arreglo[1] = Mensaje de error. */

function borrar($tabla,$condicion){
	$consulta="delete from ".$tabla." where ".$condicion;
//	echo "<br>".$consulta;
	$respuesta=mysqli_query($GLOBALS['conexion'],$consulta);
	if(mysqli_error($GLOBALS['conexion'])){
	// si hubo errores en la consulta
		$regreso[0] = 0;
		$regreso[1] = $GLOBALS['ERROR'];
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$consulta,"sus");
		echo $regreso[1];}
	else{
		$regreso[0] = 1;
		if(mysqli_affected_rows($GLOBALS['conexion'])!=0)
			$regreso[1] = "Se borraron ".mysqli_affected_rows($GLOBALS['conexion']). " registros";
		else{
			$regreso[1]= $GLOBALS['err_select'];
			echo $GLOBALS['err_select'];}}
	return $regreso;}
	
	
function iUsuario($valsEmpleado,$valsPuesto){  /*esta funcionando en algun lado?? si es así creo que hace falta quitar los campos segun el formulario de la vista*/
	$sql = "SET AUTOCOMMIT=0;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	
	$sql = "BEGIN;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	
	$sql = "INSERT INTO empleado (
			gradoAcad,
			nombre,
			apellidoP,
			apellidoM,
			iniciales,
			noTrabajador,
			idFirmaSUS,
			telFijo,
			telMovil,
			telOficina,
			eMailPers,
			eMailOf,
			fechaIngreso,
			RFC,
			CURP,
			estatus)
		VALUES (".$valsEmpleado.",1)";

	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	$newEmp = mysqli_insert_id($GLOBALS['conexion']);
	/*verificar que $newEmp esté pasando. hubo errores en la transaccion InsertaEmpleado*/

	if(($newEmp=!0)&&($newEmp=!NULL)){
		$sql = "INSERT INTO puesto (idEmpleado,puesto,idArea,fechaInicio,estatus) values (".$newEmp.",".$valsPuesto.",1)";
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);}
	else{
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}
			
	if ($resultado) {
		$sql = "COMMIT";
		$regreso[0] = mysqli_query($GLOBALS['conexion'],$sql);
		$regreso[1] = mysqli_affected_rows($GLOBALS['conexion']);}
	else{
		$sql = "ROLLBACK;";
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);
		$regreso[0]=0;
		$regreso[1]=0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}
	
return $regreso;}

function trInsertEmpleado($valsEmpleado,$valsPuesto){
	$sql = "SET AUTOCOMMIT=0;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);

	$sql = "BEGIN;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);

	$sql = "INSERT INTO empleado (
			gradoAcad, 		nombre,
			apellidoP,		apellidoM,
			iniciales,		firma,
			telOficina,
			eMailOf,		estatus)
		VALUES (".$valsEmpleado.",1)";

	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	$newEmp = mysqli_insert_id($GLOBALS['conexion']);
	$temp = $newEmp;

	if(($newEmp=!0)&&($newEmp=!NULL)){
		$sql = "INSERT INTO puesto (idEmpleado,puesto,idArea,estatus) values (".$temp.",".$valsPuesto.",1)";
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);}
		//faltaría la comprobación de que el insert puesto se hizo
	
	else{
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}

	if ($resultado) {
		$sql = "COMMIT";
		$regreso[0] = mysqli_query($GLOBALS['conexion'],$sql);
		$regreso[1] = mysqli_affected_rows($GLOBALS['conexion']);}
	else{
		$sql = "ROLLBACK;";
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);
		$regreso[0]=0;
		$regreso[1]=0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}
		return $regreso;}
		
function trNuevoSAC($update,$insert){
	$sql = "SET AUTOCOMMIT=0;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	
	$sql = "BEGIN;";
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	
	$sql = "INSERT INTO puesto VALUES ($insert)";
		
	$resultado=mysqli_query($GLOBALS['conexion'],$sql);
	$newPuesto = mysqli_insert_id($GLOBALS['conexion']);
	
	if(($newPuesto=!0)&&($newPuesto=!NULL)){
		$sql = "UPDATE puesto SET ".$update;
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);}
		//falta mysqli_affected_rows (); para saber que si se hizo una actualizacion en alguna linea porque si no hay error en la consulta manda true aunque no se actualice nada}
	else{
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}
	
	if ($resultado) {
		
		$sql = "COMMIT";
		$regreso[0] = mysqli_query($GLOBALS['conexion'],$sql);;
		$regreso[1] = mysqli_affected_rows($GLOBALS['conexion']);}
	else{
		$sql = "ROLLBACK;";
		$resultado=mysqli_query($GLOBALS['conexion'],$sql);
		$regreso[0]=0;
		$regreso[1]=0;
		errorConsulta(1,mysqli_error($GLOBALS['conexion']),$sql,"sus");}
return $regreso;}
	

?>