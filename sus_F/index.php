<?php
require 'flight/Flight.php';
require 'inc/consultas.inc.php';

/* Definición de las rutas */
Flight::route('/', function() {
	$header = array(
			'menu' => 'no'
	);
	
	$data = array(
			'verifica' => (isset($_GET['verifica'])) ? $_GET['verifica'] : ""
	);
	
	Flight::render('template/header', $header);
    Flight::render('login', $data);
	Flight::render('template/footer');
});

Flight::route('POST /verifica/', function() {
	session_start();
	
	$formulario = (isset($_POST['formulario'])) ? $_POST['formulario'] : "";
	
	if ( $formulario == "index" ) {
		$usuario = (isset($_POST['usuario'])) ? addslashes($_POST['usuario']) : "";
		$contrasenia = (isset($_POST['contrasenia'])) ? addslashes($_POST['contrasenia']) : "";
		
		$usuario=seleccionarSinMsj("*","usuarioSUS","usuario='".$usuario."' and contrasenia='".$contrasenia."'");
	
		if ( is_array($usuario) && $usuario[0] != null ) {
				
			$_SESSION['tipoUsuario'] = $usuario['tipoUsuario']; 
			$_SESSION['idUsuario']= $usuario['idUsuario'];
			$_SESSION['idEmpleado']=$usuario['idEmpleado'];
			$_SESSION['idUAutoriza']=$usuario['idUsuAutoriza'];
			
			if ( $_SESSION['tipoUsuario'] == 1 ) {
				Flight::redirect('principal');
			} else {
				Flight::redirect('servicios/estado-de-solicitudes');
			}
		} else {
			Flight::redirect('/?verifica=10');
		}
	
	} // si el formulario es index
});

Flight::route('/principal/', function() {
	require_once 'controllers/principal_controller.php';
});

Flight::route('/sus/', function() {
	require_once 'controllers/sus_controller.php';
});

Flight::route('/guardaSUS/', function() {
	require 'controllers/guardaSUS_controller.php';});

Flight::route('/estadoSUS/', function() {
	require_once 'controllers/estadoSUS_controller.php';
});

Flight::route('/evaluacion/evaSolicitud/', function() {
	require_once 'controllers/evaSolicitud:controller.php';
});

Flight::route('/reportes/infoMes/', function() {
	Flight::render('reportes/infoMes');
});

Flight::route('/reportes/cargar-informe-mensual/', function() {
	require_once 'controllers/infoMensual_controller.php';
});

Flight::route('/administracion/alta-de-empleado/', function() {
	require_once 'controllers/empleado_controller.php';
});

Flight::route('/administracion/alta-de-usuario/', function() {
	require_once 'controllers/usuario_controller.php';
});

Flight::route('/salir/', function() {
	session_start();

	$_SESSION = array();
	session_destroy();
	session_unset();

	Flight::redirect('/');
});

Flight::start();
?>
