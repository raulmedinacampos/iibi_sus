<?php

/*Función generarClave

Genera una clave aleatoria de 8 caracteres.
No necesita parámetros. Regresa la clave generada.*/


function generarClave($longitud =8){ 
	$cadena="[^A-Z0-9]"; 
	return substr(eregi_replace($cadena, "", md5(rand())) . 
	eregi_replace($cadena, "", md5(rand())) . 
	eregi_replace($cadena, "", md5(rand())), 
	0, $longitud);} 


/*Funcion generarUsuario
 * Toma el nombre y apellidos de la persona y construye el nombre de usuario
 * primera letra del nombre, primer apellido completo, primera letra del segundo apellido
 */
	
function generarUsuario($nombre,$ap1,$ap2){
	return strtoupper(substr($nombre, 0, 1).$ap1.substr($ap2, 0, 1));
}
	
	
/*Funcion normaliza fecha para base de datos

Cambia la forma dd/mm/aaaa a 
aaaa-mm-dd que entrega el calendio en javascript


Recibe como parámetro la fecha a cambiar.*/

function normaFecha($fecha){
	$año = substr($fecha,6,4); 
	$dia = substr($fecha,3,2);
	$mes = substr($fecha,0,2);
	return $año."-".$mes."-".$dia;
	}



function normaCampo($campo) {

	$campo=trim($campo);
	while (strpos($campo,"  ")>0)
		$campo=str_replace("  "," ",$campo);
	return($campo);}


function normaBusca($nomcampo,$campo) {

	if (strpos($campo,"*")>0) {
		$campon=trim($campo) . ' ';
		$campo='';
		while (strpos($campon,"*")>0) {
			$espac=strpos($campon," ");
			$campox=substr($campon,0,$espac);
			$aster=strpos($campox,"*");
			if ($aster>0)$campo .= ' @' . substr($campox,0,$aster);
			else $campo .= ' ' . $campox;
			$campon = substr($campon,$espac+1);
		}
		$campo .= ' ' . $campon;
	}
	$campo=trim($campo);
	while (strpos($campo,"  ")>0) $campo=str_replace("  "," ",$campo);
	$campo=strtolower($campo);
	$campo=str_replace(" and ","--and--",$campo);
        $campo=str_replace(" not ","--not--",$campo);
	$campo=str_replace(" or "," ",$campo);
	$campo=str_replace(" ","%' or $nomcampo like '%",$campo);
	$campo=str_replace("--and--","%' and $nomcampo like '%",$campo);
        $campo=str_replace("--not--","%' and $nomcampo not like '%",$campo); 
	$campo="'%".$campo."%'";
	$campo=str_replace("%@","",$campo);
	$campo=str_replace("_"," ",$campo);
        $campo="$nomcampo like ".$campo;
	return($campo);}

function mesLargo($mesNum){
	$mesNum = (int)$mesNum;
	switch ($mesNum){
	case 1: $mesL = "Enero"; break;
	case 2: $mesL = "Febrero"; break;
	case 3: $mesL = "Marzo"; break;
	case 4: $mesL = "Abril"; break;
	case 5: $mesL = "Mayo"; break;
	case 6: $mesL = "Junio"; break;
	case 7: $mesL = "Julio"; break;
	case 8: $mesL = "Agosto"; break;
	case 9: $mesL = "Septiembre"; break;
	case 10: $mesL = "Octubre"; break;
	case 11: $mesL = "Noviembre"; break;
	case 12: $mesL = "Diciembre"; break;
	
	return($mesL);}
}
	
?>