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
	<p>En atención a su solicitud de servicios con folio ".$folioM." le informamos que ya fue verificada por el área correspondiente. 
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
	<p>En atención a su solicitud con folio ".$folioM." le informamos que el área de Servicios Generales la ha dado por concluida. </br>
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

function mailNewContra($solNombre,$solMail,$usuario,$newContra){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>En atención a su solicitud de cambio de contraseña, se ha enviado automáticamente este correo con sus nuevas credenciales.
	<br> USUARIO: ".$usuario."
	<br> CONTRASEÑA: ".$newContra."
	<br>Le recordamos que puede acceder al sistema en la siguiente dirección electrónica mediante el portal de este Instituto.</p>";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Nueva contraseña para la solicitud de servicios");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		//print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}

function mailEnvioContra($solNombre,$solMail,$usuario,$contra){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>Por este medio se le informa que se ha dado de alta como usuario del Sistema de solicitud única de servicios del IIBI.
	<br> Podrá ingresar al sistema mediante la liga dispuesta en el catálogo de servicios de la Secretaría Administrativa utilizando las siguientes credenciales.</p>
	<p> USUARIO: ".$usuario."
	<br> CONTRASEÑA: ".$contra."</p>
	<p>".$GLOBALS['jefeServicios']."
	<br>Servicios generales<br>Secretaría Administrativa, IIBI.</p>";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Cuenta de acceso al sistema de solicitud única de servicios");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}
