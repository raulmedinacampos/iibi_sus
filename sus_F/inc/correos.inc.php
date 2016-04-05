<?php
require './inc/phpmailer/PHPMailerAutoload.php';

global $hostM, $puertoM,$usuM,$contraM,$jefeServicios;
$puertoM = "587";
$hostM = "iibi.unam.mx";
$usuM ="dafne";			//nombre de la cuenta que manda el correo
$contraM="d4fn3b4r";	//contraseña de la cuenta que manda el correo
$jefeServicios = "Lic. Lucero Urbina Hernández"; // cambiar esto por una consulta a la base que de el nombre

/*Funcion mailValidacion
 * 
 * Envia el correo electrónico al usuario para avisar que su solicitud fue verificada por parte de servicios generales
 * y ya está en trámite.
 * 
 * Como párametros recibe
 * 		solNombre 	nombre del usuario solicitante
 * 		solMail	correo electrónico del usuario solicitante  * */

function mailValidacion($solNombre,$solMail,$folioM){
	
	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>En atención con su solicitud de servicios con folio ".$folioM." le informamos que ya fue verificada por el área correspondiente. 
	<br> Para continuar con el trámite se le solicita imprima el formato y requisite  las firmas correspondientes.Podrá consultar el estado de su solicitud en el sistema de Solicitud Única de Servicio.</p>
  	<p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.";
//	print "globales: $GLOBALS[hostM]";
//	print_r ($GLOBALS);
	
	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];
	
	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Confirmación de verificación de solicitud de servicios");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		//print_r($mail->ErrorInfo);
		$regreso=0;}
	else 
		$regreso=1;
	
	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);	
	return $regreso;
	
}


function mailTerminacion($solNombre,$solMail,$folioM){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>En atención con su solicitud con folio ".$folioM." le informamos que el área de Servicios Generales la ha dado por concluida. </br>
	<br>Favor de verificar dicha actividad para posteriormente ingresar al sistema y evaluar el servicio otrorgado.</p>
  	<p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Conclusión del servicio solicitado");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send()))
		$regreso=0;
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}

function mailCancelacion($solNombre,$solMail,$folioM){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>Le informamos que su solicitud con folio ".$folioM." ha sido cancelada. Por favor comuníquese al 562-30374 para mayor información.</p>
  	<p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Cancelación del servicio solicitado");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send()))
		$regreso=0;
		else
			$regreso=1;

			unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
			return $regreso;

}

function mailNewSol($tipoServicio,$solicitante,$folio){
	$mensaje	=  "<p>".$GLOBALS['jefeServicios']."</p>
	
	<p>Se le informa que tiene una nueva solicitud de ".$tipoServicio." por parte de $solicitante con folio $folio.</p>
	<p>Para ver los detalles del servicio por favor ingrese al sistema de Solicitud Única de Servicios.<p>";

	$mail = new PHPMailer();
	$mail->IsSMTP();
	
	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];
	
	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress("$mail->Username.'@'.$mail->Host",$GLOBALS['jefeServicios']); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Nueva solicitud de servicios");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		//print_r($mail->ErrorInfo);
		$regreso=0;	}
	else 
		$regreso=1;
	
	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;
}

