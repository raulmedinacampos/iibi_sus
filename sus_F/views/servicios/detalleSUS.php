<h3 style="margin-top:0;"><strong class="text-primary">Folio: <?php echo $folio; ?></strong></h3>

<p><strong class="text-primary">Fecha de solicitud: </strong><?php echo $solicitud['fechaS']; ?></p>
<p><strong class="text-primary">Fecha de autorización: </strong><?php echo $solicitud['fechaV']; ?></p>

<p><strong class="text-primary">Responsable y área solicitante: </strong><?php echo $nomResponsable.", ".$area['area']; ?></p>
<p><strong class="text-primary">Nombre del usuario: </strong><?php echo $nomUsuario; ?></p>
<p><strong class="text-primary">Teléfono: </strong><?php echo $empleado['telOficina']; ?></p>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title"><?php echo $titulo; ?></h4>
	</div>
	<div class="panel-body">
	<p><strong class="text-primary">Servicio requerido: </strong><?php echo $solicitud['descripcion']; ?></p>
	<p><strong class="text-primary">Descripción: </strong><?php echo $solicitud['detalle']; ?></p>
	<p><strong class="text-primary">Estado: </strong><?php echo $estado['estatus']; ?></p><?php 
	if($solicitud['motivo']!=NULL){?>
	<p><strong class="text-primary">Comentarios: </strong><?php echo $solicitud['motivo']; ?></p><?php }
	
	if($solicitud['evaluacion']!=NULL){?>
	<hr><p><strong class="text-primary">Evaluación: </strong><?php echo $solicitud['evaluacion']; ?></p>
	<p><strong class="text-primary">Observaciones: </strong><?php echo $solicitud['obsEva']; ?></p><?php }?>
	</div>
</div>