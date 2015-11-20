
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema de Control de Gestión</title>
<!-- Hojas de estilo -->
<link href="http://iibi.ferozo.com/css/bootstrap.min.css" rel="stylesheet" />
<link href="http://iibi.ferozo.com/css/general.css" rel="stylesheet" />
				<link href="http://iibi.ferozo.com/css/bootstrap-datepicker.min.css" rel="stylesheet" />
				<link href="http://iibi.ferozo.com/css/alto_columnas.css" rel="stylesheet" />
				<link href="http://iibi.ferozo.com/css/formato_solicitud.css" rel="stylesheet" />
				
		<!-- Script -->
<!--[if lt IE 9]>
			<script src="http://iibi.ferozo.com/js/html5shiv.min.js"></script>
			<script src="http://iibi.ferozo.com/js/respond.min.js"></script>
		<![endif]-->
<script type="text/javascript" src="http://iibi.ferozo.com/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://iibi.ferozo.com/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://iibi.ferozo.com/js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="http://iibi.ferozo.com/js/jquery.validate.min.js"></script>
				<script type="text/javascript" src="http://iibi.ferozo.com/js/bootstrap-datepicker.min.js"></script>
				<script type="text/javascript" src="http://iibi.ferozo.com/js/bootstrap-datepicker.es.min.js"></script>
				<script type="text/javascript" src="http://iibi.ferozo.com/js/formato_solicitud.js"></script>
			</head>

<body>
	<div class="container">
		<form action="guardaSUS.php" id="formSolicitud" name="formSolicitud" class="form-horizontal" method="post" accept-charset="utf-8">
<div class="form-group">
<?php 
require "serviciosHeader.php";
?>

</div> <!-- Fin .form-group -->
<input name="" type="submit" value="Solicitar autorización">
<div class="form-group">

	<label class="col-sm-2">Nombre del usuario</label>
    	<div class="col-sm-10"><input type="text" name="nomSol" value="<?=$nomUsuario?>" id="area_solicitante" class="form-control" /></div>
    <label class="col-sm-2">Teléfono</label><?php echo $empleado['telefonoOf']?>
</div> <!-- Fin .form-group -->

<h4>Tipo de servicio:</h4>

<div class="row row-eq-height">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Diversos</div>
			<div class="panel-body">
				
				<div class="radio">
				<label><input type="radio" name="chk1" value="" id="chk"  />
Cafetería</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk1" value="" id="chk"  />
Limpieza</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="servicio" value="13" id="chk"  />
Otro</label>				</div> <input name="otro" type="text" value="Otro de diversos">
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Correspondencia</div>
			<div class="panel-body">
				<div class="radio">
				<label><input type="radio" name="chk2" value="" id="chk"  />
Mensajería</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk2" value="" id="chk"  />
Paquetería</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk2" value="" id="chk"  />
Otro</label>				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Mantenimiento a equipo y vehículos</div>
			<div class="panel-body">
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Mecánica</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Refrigeración</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Aire acondicionado</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Equipo de cómputo</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Reparación equipo</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Planta de luz</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk3" value="" id="chk"  />
Otro</label>				</div>
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Reproducción y engargolado</div>
			<div class="panel-body">
				<div class="radio">
				<label><input type="radio" name="chk4" value="" id="chk"  />
Fotocopiado</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk4" value="" id="chk"  />
Engargolado</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk4" value="" id="chk"  />
Otro</label>				</div>
			</div>
		</div>
	</div>
</div> <!-- Fin .row -->

<div class="row row-eq-height">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Transporte</div>
			<div class="panel-body">
				<div class="radio">
				<label><input type="radio" name="chk5" value="" id="chk"  />
Local</label>				</div>
	
				<div class="radio">
				<label><input type="radio" name="chk5" value="" id="chk"  />
Foráneo</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk5" value="" id="chk"  />
Pasajeros</label>				</div>
				
				<div class="radio">
				<label><input type="radio" name="chk5" value="" id="chk"  />
Carga</label>				</div>
			</div>
		</div>
	</div>
	
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">Servicio a inmueble</div>
			<div class="panel-body">
				<div class="col-sm-6">
					<div class="radio">
					<label><input type="radio" name="servicio" value="61" id="chk" checked="checked"  />
Albañilería</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Carpintería</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Herrerería</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Cerrajería</label>					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Electricidad</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Plomería</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Pintura</label>					</div>
					
					<div class="radio">
					<label><input type="radio" name="chk6" value="" id="chk"  />
Otro</label>					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Vigilancia para eventos especiales</div>
			<div class="panel-body">
				<div class="radio">
				<label><input type="radio" name="chk7" value="" id="chk"  />
Vigilancia</label>				</div>
			</div>
		</div>
	</div>
</div> <!-- Fin .row -->

<label>Descripción del servicio</label><textarea name="descripcion" cols="40" rows="3" id="area_solicitante" class="form-control" >DESCRIPCIÓN del servicio ÁÉÑ</textarea>

<label>Detalle del servicio</label><textarea name="detalle" cols="40" rows="3" id="area_solicitante" class="form-control" >DETALLE del servicio  ÁÉÑ</textarea>

<br />
<p class="nota">Nota: Es necesario elaborar una solcitud por cada servicio requerido</p>
<input name="" type="submit" value="Solicitar autorización">
</form>			
		</div>
	</body>
</html>