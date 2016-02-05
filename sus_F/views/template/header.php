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
		<ul id="cbp-tm-menu" class="cbp-tm-menu">
			<li><a href="sus" target="myDiv">Solicitud Única de Servicios</a></li>
			<li><a href="estadoSUS" target="myDiv">Estado de solicitudes</a></li>
			<li><a href="#">Reportes</a>
				<ul class="cbp-tm-submenu">
					<li><a href="reportes/infoMes" target="myDiv">Informe mensual</a></li>
					<li><a href="#" class="cbp-tm-icon-mail" target="_self">Informe 2</a></li>
				</ul>
			</li>
			<li><a href="#">Administración</a>
				<ul class="cbp-tm-submenu">
					<li><a href="administracion/alta-de-empleado" class="cbp-tm-icon-archive" target="_self">Alta de empleado</a></li>
					<li><a href="administracion/alta-de-usuario" class="cbp-tm-icon-archive" target="_self">Alta de usuario</a></li>
				</ul>
			</li>
			<li><a href="#">Ayuda</a>
				<ul class="cbp-tm-submenu">
					<li><a href="#" class="cbp-tm-icon-archive" target="_self">Normatividad</a></li>
					<li><a href="#" class="cbp-tm-icon-archive" target="_self">Manual de usuario</a></li>
					<li><a href="#" class="cbp-tm-icon-users" target="_self">Datos personales</a></li>
					<li><a href="contraCambiar.php" class="cbp-tm-icon-key" target="i_frame">Cambiar contraseña</a></li>
				</ul>
			</li>
			<li><a href="salir">Salir</a></li>
		</ul>
	</div><!-- termina menu -->
	<?php
	}
	?>
	
	<div class="contenido">
