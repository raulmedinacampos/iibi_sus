<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Instituto de Investigaciones Bibliotecológicas Página Web de Créditos" />
	
	<title>IIBI - Solicitud única de servicios</title>
	
	<link rel="shortcut icon" href="http://iibi.unam.mx/favicon.ico" type="image/x-icon">
	<link rel="icon" href = "http://iibi.unam.mx/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/principal.css" />
	<link rel="stylesheet" type="text/css" href="css/index_estilos.css" media="screen"  />
	<?php
	if (isset ( $css )) {
		foreach ( $css as $val ) {
	?>
	<link href="<?php echo 'css/'.$val.'.css'; ?>" rel="stylesheet" />
	<?php
		}
	}
	?>
	
	<script src="js/jquery.js"></script>
	<script src="js/fecha.js" type="text/javascript"></script>
	<script src="js/jqueryvalidation.js"></script>
	<script src="js/validarIndex.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/cambiar_contrasenia.js" type="text/javascript"></script>
 
	<?php
	if (isset ( $js )) {
		foreach ( $js as $val ) {
			?>
	<script type="text/javascript" src="<?php echo 'js/'.$val.'.js'; ?>"></script>
	<?php
		}
	}
	?>
</head>

<body>

<div class="contenedor">
	<div class="encabezado">
		<a href="http://www.unam.mx" target="_blank">
			<img class="imgunam" src="images/banner/img_trans.gif" width="1" height="1" border="0" />
		</a>
		<a href="http://cuib.unam.mx">
			<img class="imgiibi" src="images/banner/img_trans.gif" width="1" height="1" border="0" />
		</a>
	</div><!-- termina encabezado -->
	
	<div class="navegacion">
		<div class="navegacion-fecha">
			<div id="scriptFecha"></div>
		</div>
	</div><!-- termina navegacion -->
	
	<?php
	if ( !isset($menu) ) {
	?>
	<div class="menu">
		<ul id="cbp-tm-menu" class="cbp-tm-menu"><?php 
			if ( $_SESSION['tipoUsuario'] != 6) {?>
			<li><a href="sus" target="myDiv">Solicitud Única de Servicios</a></li><?php }?>
		
		
			<li><a href="estadoSUS" target="myDiv">Estado de solicitudes</a></li><?php 
			if ( $_SESSION['tipoUsuario'] != 1) {?>
			<li><a href="#">Reportes</a>
				<ul class="cbp-tm-submenu"><?php 
					if ( $_SESSION['tipoUsuario'] == 3 OR $_SESSION['tipoUsuario']==5) {?>
					<li><a href="reportes/infoMes" target="myDiv">Informe mensual</a></li><?php }?>
					<li><a href="reportes/mantenimientos-realizados" target="_self">Mantenimientos realizados</a></li>
					<li><a href="reportes/servicios-electricos" target="_self">Servicios eléctricos</a></li>
					<li><a href="reportes/servicios-con-duraciones" target="_self">Servicios en tiempo</a></li>
					<li><a href="reportes/estadisticas-de-cancelacion" target="_self">Cancelaciones</a></li>
				</ul>
			</li><?php }
			
			if ( $_SESSION['tipoUsuario'] == 3 OR $_SESSION['tipoUsuario']==5) {?>
			<li><a href="#">Administración</a>
				<ul class="cbp-tm-submenu">
					<li><a href="administracion/lista-de-usuarios" class="cbp-tm-icon-archive" target="_self">Lista de usuarios</a></li>
					<li><a href="administracion/alta-de-empleado" class="cbp-tm-icon-archive" target="_self">Alta de empleado</a></li>
					<li><a href="administracion/alta-de-usuario" class="cbp-tm-icon-archive" target="_self">Alta de usuario</a></li>
					<li><a href="administracion/duracion-de-servicios" target="_self">Duración de servicios</a></li>
					<li><a href="administracion/firmas-autorizadas" target="_self">Firmas autorizadas</a></li>
				</ul>
			</li><?php }?>
			
			<li><a href="#">Ayuda</a>
				<ul class="cbp-tm-submenu"><?php
				$normatividad = "";
				$man="";
				if ( $_SESSION['tipoUsuario'] == 1 ) {
					$normatividad = 'http://132.248.242.11/catServicios/catalogo.php';
					$man="manSUS_usu.pdf";}
				
				else{
					$normatividad = 'http://www.sgc.unam.mx/Servicios%20Generales/Forms/AllItems.aspx';
					$man="manSUS_adm.pdf";}?>
					<li><a href="<?php echo $normatividad; ?>" class="cbp-tm-icon-archive" target="_blank">Normatividad</a></li>
					<li><a href="http://132.248.242.11/sus/<?php echo $man; ?>" class="cbp-tm-icon-archive" target="_blank">Manual de usuario</a></li><?php
					if ( $_SESSION['tipoUsuario'] != 6 ) {?>
					<li><a href="administracion/editar-empleado" class="cbp-tm-icon-users" target="_self">Datos de usuario</a></li> 
					<li><a href="#" class="cambiar"  target="_self">Cambiar contraseña</a></li><?php }?>
				</ul>
			</li>
			<li><a href="salir">Salir</a></li>
		</ul>
	</div><!-- termina menu -->
	<?php
	}
	?>
	
	<div class="contenido">
