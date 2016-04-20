<?php
$msg = null;

if( isset($_POST["phpmailer"]) ) {

  $nombre 	= htmlspecialchars("Dafne Abad");
  $asunto 	= "Confirmación de validación de solicitud de servicios";
  $folioM 	="3/2016";
  $mensaje	= "<p>.$nombre.</p>
		   <p>En atención con su solicitud de servicios con folio ".$folioM." le informamos que ya fue verificada por el área correspondiente. Para continuar con el trámite se le solicita imprima el formato, requisite  las firmas correspondientes.Podrá consultar el estado de su solicitud en el sistema de Solicitud Única de Servicio.</p>
  		   <p>Atentamente</p><br>Servicios Generales<br>Secretaría Administrativa, IIBI. 3:02";
    
//  require "./inc/phpmailer/class.phpmailer.php";
//  require './inc/phpmailer/class.smtp.php';
  require './inc/phpmailer/PHPMailerAutoload.php';
  
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
//  $mail->isSendmail(); // telling the class to use SendMail transport

//  $mail->SMTPDebug  = 0; 
//  $mail->SMTPAuth   = true;
//  $mail->SMTPSecure = 'ssl';

  
//  $mail->Host       = "smtp.gmail.com";    // servidor de correo
  $mail->Host		= "iibi.unam.mx";

//  $mail->Port       = 465;                 // puerto de salida que usa Gmail
  $mail->Port 	  = 587;

//  $mail->Port 	  = 25;


//  $mail->Username   = "dafne.abad@gmail.com";
//  $mail->Password   = 'd097134747';

  $mail->Username   = "dafne";
  $mail->Password   = 'd4fn3b4r';

  
//  $mail->SetFrom('dafne@gmail.com', 'Dafne en IIBI');
//  $mail->AddAddress("dafne@iibi.unam.mx","Remitente"); //Dirección y nombre del remitente.

  $mail->SetFrom('dafne@iibi.unam.mx', 'Dafne en IIBI');
  $mail->AddAddress("dafne.abad@gmail.com","Remitente"); //Dirección y nombre del remitente.



  $mail->Subject    = $asunto;
  $mail->MsgHTML($mensaje);

  if($mail->Send())
    $msg = "Ã‰xito";
  else
    $msg = "Error";
    print_r($mail->ErrorInfo);
    
  echo $msg;
}
?>

<HTML>
  <HEAD><meta charset="utf-8"></head>
  <body>
  <strong><?php echo $msg;?></strong><br>
  
  <h2>Enviar email</h2>
  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>">
  <input type='hidden' name="phpmailer">
  <input type='submit' value="enviar">  
  </form>
  </body>
</html>