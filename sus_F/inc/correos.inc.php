<?php
require './inc/phpmailer/PHPMailerAutoload.php';

$host = "iibi.unam.mx";
$puerto = 587;
$usuMail ="dafne";
$contraMail="d4fn3b4r";


/*Funcion mailValidacion
 * 
 * Envia el correo electrónico al usuario para avisar que su solicitud fue verificada por parte de servicios generales
 * y ya está en trámite.
 * 
 * Como párametros recibe
 * 		nombre 	nombre del usuario solicitante
 * 		mail	correo electrónico del usuario solicitante  * */

function mailValidacion($solNombre,$solMail,$folioM){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>En atención con su solicitud de servicios con folio ".$folioM." le informamos que ya fue verificada por el área correspondiente. 
	<br> Para continuar con el trámite se le solicita imprima el formato y requisite  las firmas correspondientes.Podrá consultar el estado de su solicitud en el sistema de Solicitud Única de Servicio.</p>
  	<p>Atentamente</p><br>Servicios Generales<br>Secretaría Administrativa, IIBI.";

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host		  = $GLOBALS['host'];
	$mail->Port 	  = $GLOBALS['puerto'];
	$mail->Username   = $GLOBALS['usuMail'];
	$mail->Password   = $GLOBALS['contraMail'];

	$mail->SetFrom($GLOBALS['usuMail'].'@'.$GLOBALS['host'], 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = "Confirmación de verificación de solicitud de servicios";
	$mail->MsgHTML($mensaje);

	if(!($mail->Send()))
		print_r($mail->ErrorInfo);
}
