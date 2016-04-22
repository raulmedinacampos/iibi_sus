<?php
require 'flight/Flight.php';
require 'inc/consultas.inc.php';

/* Definición de las rutas */
Flight::route('/', function() {
	$header = array(
			'menu' => 'no');
	
	$data = array(
			'verifica' => (isset($_GET['verifica'])) ? $_GET['verifica'] : "");
	
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
			
			if($usuario['idUsuAutoriza']==0)
				$_SESSION['idUAutoriza']=$usuario['idEmpleado'];
			else
				$_SESSION['idUAutoriza']=$usuario['idUsuAutoriza'];
			
			if ( $_SESSION['tipoUsuario'] == 1 ) {
				Flight::redirect('principal');
			} else {
				Flight::redirect('principal');
			}
		} else {
			Flight::redirect('/?verifica=10');
		}
	
	} // si el formulario es index
});

Flight::route('/principal/', function() {
	require_once 'controllers/principal_controller.php';
});


/*Solicitud de servicios*/
Flight::route('/sus/', function() {
	require_once 'controllers/sus_controller.php';
});

Flight::route('/sus-pdf/', function() {
	require_once 'controllers/susPDF_controller.php';
});

Flight::route('/guardaSUS/', function() {
	require 'controllers/guardaSUS_controller.php';
});

/*Estado de solicitudes*/
Flight::route('/estadoSUS/', function() {
	require_once 'controllers/estadosSUS/estadoSUS_controller.php';
});

Flight::route('/resultados-estadoSUS/', function() {
	require_once 'controllers/estadosSUS/estadoSUSResultados_controller.php';
});
	
Flight::route('/detalleSUS/', function() {
	require_once 'controllers/estadosSUS/detalleSUS_controller.php';
});

/*Acciones para solicitudes*/
Flight::route('/sus/evaluar-solicitud/', function() {
	require_once 'controllers/estadosSUS/evaSolicitud_controller.php';
});

/*NO CREO QUE VAYA ESTO*/
Flight::route('/evaluacion/evaSolicitud/', function() {
	require_once 'controllers/estadosSUS/evaSolicitud_controller.php';
});
	
Flight::route('/sus/validar-solicitud/', function() {
	require_once 'controllers/estadosSUS/validarSol_controller.php';
});

Flight::route('/sus/cancelar-solicitud/', function() {
	require_once 'controllers/estadosSUS/cancelaSol_controller.php';
});

Flight::route('/sus/terminar-solicitud/', function() {
	require_once 'controllers/estadosSUS/terminarSol_controller.php';
});

Flight::route('/sus/archivar-solicitud/', function() {
	require_once 'controllers/estadosSUS/archivarSol_controller.php';
});

Flight::route('/sus/subir-documento/', function() {
	require_once 'controllers/estadosSUS/subirDocumento_controller.php';
});

Flight::route('/sus/busca_archivo_sus/', function() {
	require_once 'controllers/estadosSUS/buscar_sus_controller.php';
});
	


/*reportes*/
Flight::route('/reportes/infoMes/', function() {
	Flight::render('reportes/infoMes');
});

Flight::route('/reportes/cargar-informe-mensual/', function() {
	require_once 'controllers/infoMensual_controller.php';
});

Flight::route('/reportes/infoMes-consultar/', function() {
	require_once 'controllers/infoMensualFiltro_controller.php';
});

Flight::route('/reportes/guarda-informe-mensual/', function() {
	require_once 'controllers/guardaInfoMensual_controller.php';
});
	
Flight::route('/reportes/informe-mensual-pdf/', function() {
	require_once 'controllers/infoMesPDF_controller.php';
});

Flight::route('/reportes/mantenimientos-realizados/', function() {
	Flight::render('reportes/mtos_realizados');
});

Flight::route('/reportes/mantenimientos-realizados-pdf/', function() {
	require_once 'controllers/reportes/mtosRealizadosPDF_controller.php';
});

Flight::route('/reportes/servicios-electricos/', function() {
	Flight::render('reportes/servicios_electricos');
});

Flight::route('/reportes/servicios-electricos-pdf/', function() {
	require_once 'controllers/reportes/serviciosElectricosPDF_controller.php';
});

Flight::route('/reportes/servicios-con-duraciones/', function() {
	Flight::render('reportes/servicios_duracion');
});

Flight::route('/reportes/servicios-con-duraciones-pdf/', function() {
	require_once 'controllers/reportes/serviciosDuracionPDF_controller.php';
});
	
Flight::route('/reportes/estadisticas-de-cancelacion/', function() {
	Flight::render('reportes/estadisticas_cancelacion');
});
	
Flight::route('/reportes/estadisticas-de-cancelacion-pdf/', function() {
	require_once 'controllers/reportes/estadisticasCancelacionPDF_controller.php';
});
	
	
/*Administración*/

Flight::route('/administracion/lista-de-usuarios/', function() {
	require_once 'controllers/administracion/lista_usuarios_controller.php';
});
	
Flight::route('/listado-empleados/', function() {
	require_once 'controllers/lista_empleados_controller.php';
});

Flight::route('/listado-firmas/', function() {
	require_once 'controllers/lista_firmas_controller.php';
});
	
Flight::route('/administracion/editar-empleado/', function() {
	require_once 'controllers/administracion/editar_empleado_controller.php';
});

Flight::route('/administracion/actualiza-empleado/', function() {
	require_once 'controllers/administracion/actualizaEmpleado_controller.php';
});	

Flight::route('/administracion/modificar-perfil-usuario/', function() {
	require_once 'controllers/administracion/modifica_perfil_controller.php';
});

Flight::route('/administracion/eliminar-usuario/', function() {
	require_once 'controllers/administracion/baja_usuario_controller.php';
});
	
Flight::route('/listado-grupos/', function() {
	require_once 'controllers/lista_grupos_controller.php';
});
	
Flight::route('/administracion/alta-de-empleado/', function() {
	require_once 'controllers/administracion/empleado_controller.php';
});

Flight::route('/administracion/guarda-empleado/', function() {
	require_once 'controllers/administracion/guardaEmpleado_controller.php';
});


Flight::route('/administracion/buscar-empleado/', function() {
	require_once 'controllers/administracion/buscarEmpleado_controller.php';
});

Flight::route('/administracion/buscar-info/', function() {
	require_once 'controllers/administracion/buscarInfoEmpleado_controller.php';
});

	
Flight::route('/administracion/alta-de-usuario/', function() {
	require_once 'controllers/administracion/usuario_controller.php';
});

Flight::route('/administracion/guarda-usuario/', function() {
	require_once 'controllers/administracion/guardaUsuario_controller.php';
});


Flight::route('/administracion/duracion-de-servicios/', function() {
	require_once 'controllers/administracion/duracion_servicios_controller.php';
});

Flight::route('/administracion/firmas-autorizadas/', function() {
	require_once 'controllers/administracion/firmas_autorizadas_controller.php';
});

/*Ayuda*/

Flight::route('/ayuda/cambiar-contra/', function() {
	require_once 'controllers/ayuda/cambiarContra_controller.php';
});

/*Salir*/
Flight::route('/salir/', function() {
	session_start();

	$_SESSION = array();
	session_destroy();
	session_unset();

	Flight::redirect('/');
});

Flight::start();
?>
