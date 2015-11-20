<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />

<?php
session_start();
require("../inc/consultas.inc.php");
require("../inc/herramientas.inc.php");

//cambiar a estado 0
function Modificar($folio){
	$cambio = actualizar ('servicioSUS','estatus = 0','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud en modificación.";}

//estado 1 es hacer solicitud
//cambiar a estado 2
function vistoBueno($folio){
	$cambio = actualizar ('servicioSUS','estatus = 2 and fechaAprob=curdate()' ,'folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud con visto bueno del jefe inmediato.";}

//cambiar a estado 3
function sinVistoBueno($folio){
	$cambio = actualizar ('servicioSUS','estatus = 3 and fechaAprob=curdate()' ,'folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud no autorizada por el jefe inmediato.";}
	
//cambiar a estado 4	
function solicitarSP($folio){
	$cambio = actualizar ('servicioSUS','estatus = 4 and fechaVerific=curdate() ','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud verificada por Servicios generales, en espera de suficiencia presupuestal.";}

//cambiar a estado 5 
function noValidarSG($folio, $motivo){
	$cambio = actualizar ('servicioSUS','estatus = 5 and motivo="'.$motivo.'" and fechaVerific=curdate() ','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud no verificada por Servicios generales.";}

//cambiar a estado 6
function conSuficiencia($folio){
	$cambio = actualizar ('servicioSUS','estatus = 6 ','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud verificada y con suficiencia presupuestal.";}

//cambiar a estado 7
function sinSuficiencia($folio){
	$cambio = actualizar ('servicioSUS','estatus = 7 and motivo="Solicitud sin suficiencia presupuestal."','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud sin suficiencia presupuestal.";}

//cambiar a estado 8
//pendiente
function enProceso($folio){

	$consulta =seleccionar('duracionEstimada','cTipoServicio','idTipoServicio='.$solicitud['idTipoServicio']);
	$duracionE=$consulta['duracionEstimada'];
	
	$solicitud=seleccionar('*','servicioSUS','folio="'.$folio.'"');
	$fechaM=$solicitud['fechaModif'];
	
	
	
	
	$cambio = actualizar ('servicioSUS','estatus = 8 and fechaCompromiso=curdate()','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud sin suficiencia presupuestal.";}


//cambiar a estado 9
function cancelar($folio,$motivo){
	$cambio = actualizar('servicioSUS','estatus = 9 and fechaLiberacion=curdate() and motivo="'.$motivo.'"','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
		echo "Solicitud cancelada.";}

//cambiar a estado 10
function terminar(){
	$cambio= actualizar('servicioSUS','estatus = 10 and fechaLiberacion=curdate()','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
	echo "Servicio concluido.";}

//cambiar a estado 11 se hace por formulario

//cambiar a esado 12
function terminar(){
	$cambio= actualizar('servicioSUS','estatus = 12','folio = "'.$folio.'"');
	if ($cambio[0] == 1)
	echo "Solicitud archivada.";}

?>