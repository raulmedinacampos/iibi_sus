<?php
require './inc/phpmailer/PHPMailerAutoload.php';

global $hostM, $puertoM,$usuM,$contraM,$jefeServicios,$direccion;
$puertoM = "587";
$hostM = "iibi.unam.mx";
$usuM ="jefeser";			//nombre de la cuenta que manda el correo
//$usuM ="dafne";			//nombre de la cuenta que manda el correo
$contraM="Fs6eRcj9";	//contraseña de la cuenta que manda el correo
//$contraM="d4fn3b4r";	//contraseña de la cuenta que manda el correo
$jefeServicios = "Lic. Lucero Urbina Hernández"; // cambiar esto por una consulta a la base que de el nombre
$direccion="href = 'http://132.248.242.11/sus/'";

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
	<p>En atención a su solicitud de servicios con número de folio ".$folioM." le informamos que fue confirmada.</p> 
	<p>Para continuar con el trámite, descargue el formato de la solicitud desde el <a ".$GLOBALS['direccion'].">sistema de Solicitud Única de Servicios</a>, la cual se encuentra en el apartado Estado de solicitudes con la leyenda \"Verificada\". Imprímala, recabe las firmas correspondientes y entréguela en Servicios Generales de la Secretaría Administrativa del IIBI.
	</br>Podrá consultar el estado del trámite en el <a ".$GLOBALS['direccion'].">sistema de Solicitud Única de Servicios</a>.</p> 
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

	$mail->Subject    = utf8_decode("Confirmación de verificación de solicitud de servicios.");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailValidacion-$folioM");
		print_r($mail->ErrorInfo);
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
	<br>Favor de verificar dicha actividad para posteriormente ingresar al <a ".$GLOBALS['direccion'].">sistema</a> y evaluar el servicio otrorgado a más tardar en dos días posteriores al servicio otorgado.</p>
			 
  	<p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Conclusión del servicio solicitado.");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailTerminacion-$folioM");
		print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}

function mailCancelacion($solNombre,$solMail,$folioM){

	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>Le informamos que su solicitud con folio ".$folioM." fue cancelada. Por favor comuníquese al 562-30374 para mayor información.</p>
  	<p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.";

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Cancelación del servicio solicitado.");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailCancelacion-$folioM");
		print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}

function mailNewSol($tipoServicio,$solicitante,$folio){
	$mensaje	=  "<p>".$GLOBALS['jefeServicios']."</p>
	
	<p>Se le informa que tiene una nueva solicitud de ".$tipoServicio." por parte de $solicitante con folio $folio.</p>
	<p>Para ver los detalles del servicio por favor ingrese al <a ".$GLOBALS['direccion'].">sistema de Solicitud Única de Servicios.</a></p>";

	$mail = new PHPMailer();
	$mail->IsSMTP();
	
	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];
	$solMail = "$mail->Username@$mail->Host";
	
	$mail->SetFrom($solMail, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$GLOBALS['jefeServicios']); //Dirección y nombre del remitente.
	
	$mail->Subject    = utf8_decode("Nueva solicitud de servicios.");
	$mail->MsgHTML(utf8_decode($mensaje));
	//print_r ($GLOBALS);
	
	if(!($mail->Send())){
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailNewSol-$folio");
		print_r($mail->ErrorInfo);
		$regreso=0;	}
	else 
		$regreso=1;
	
	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;
}

function mailNewContra($solNombre,$solMail,$usuario,$newContra){

	
	// <br>Le recordamos que puede acceder al sistema mediante el portal de este Instituto.</p>";
	
	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>En atención a su solicitud de cambio de contraseña, se le envían sus nuevas credenciales.
	<br> USUARIO: ".$usuario."
	<br> CONTRASEÑA: ".$newContra."
	<br>Le recordamos que puede acceder al sistema dando clik <a ".$GLOBALS['direccion'].">aquí</a></p>";

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
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailNewContra-$usuario");
		print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}

function mailEnvioContra($solNombre,$solMail,$usuario,$contra){
//	<br> Podrá ingresar al sistema mediante la dirección electrónica http://132.248.242.11/sus/ dispuesta en el catálogo de servicios de la Secretaría Administrativa utilizando las siguientes credenciales.</p>
//  <p>Atentamente</p></br>".$GLOBALS['jefeServicios']."</br>Servicios Generales<br>Secretaría Administrativa, IIBI.</p>";
	$nombre 	= htmlspecialchars($solNombre);
	$mensaje	=  "<p>$nombre</p>
	<p>Por este medio se le informa su alta de usuario al <a ".$GLOBALS['direccion'].">Sistema de solicitud única de servicios </a>del IIBI.
	<br> Podrá ingresar al sistema haciendo click <a ".$GLOBALS['direccion'].">aqui</a> utilizando las siguientes credenciales.</p>
	<p> USUARIO: ".$usuario."
	<br> CONTRASEÑA: ".$contra."</p>
			
	<p>Además, puede desgargar el manual de usuario dando click <a ". $GLOBALS['direccion'].">/manSUS_usu.pdf>aquí</a></p>
	<p>Agradeceremos sus comentarios y dudas a los correos dafne@iibi.unam.mx y rebeca@iibi.unam.mx</p>";
			
	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host	  	= $GLOBALS['hostM'];
	$mail->Port 	= $GLOBALS['puertoM'];
	$mail->Username = $GLOBALS['usuM'];
	$mail->Password = $GLOBALS['contraM'];

	$mail->SetFrom($mail->Username.'@'.$mail->Host, 'Servicios generales, IIBI');
	$mail->AddAddress($solMail,$solNombre); //Dirección y nombre del remitente.

	$mail->Subject    = utf8_decode("Cuenta de acceso al sistema de solicitud única de servicios.");
	$mail->MsgHTML(utf8_decode($mensaje));

	if(!($mail->Send())){
		errorConsulta($_SESSION['idUsuario'], $mail->ErrorInfo, "mailEnvioContra-$usuario");
		print_r($mail->ErrorInfo);
		$regreso=0;}
	else
		$regreso=1;

	unset($GLOBALS['hostM'],$GLOBALS['puertoM'],$GLOBALS['usuM'],$GLOBALS['contraM'],$GLOBALS['jefeServicios']);
	return $regreso;

}
