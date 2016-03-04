<h3 style="margin-top:0;"><strong class="text-primary">Folio: <?php echo $folio; ?></strong></h3>

<p><strong class="text-primary">Fecha de solicitud: </strong><?php echo $solicitud['fechaS']; ?>
<strong class="text-primary"> Fecha de autorización: </strong><?php echo $solicitud['fechaV']; ?></p>

<p><strong class="text-primary">Responsable </strong><?php echo $nomResponsable;?></p>
<p><strong class="text-primary">Área solicitante: </strong><?php echo $area['area']; ?></p>
<p><strong class="text-primary">Nombre del usuario: </strong><?php echo $nomUsuario; ?></p>
<p><strong class="text-primary">Teléfono: </strong><?php echo $empleado['telOficina']; ?></p>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title"><?php echo $titulo; ?></h4>
	</div>
	<div class="panel-body">
	<p><strong class="text-primary">Servicio requerido: </strong><?php echo $solicitud['descripcion']; ?></p>
	<p><strong class="text-primary">Estado: </strong><?php echo $estado['estatus']; ?></p><?php 
	if($solicitud['motivo']!=NULL){?>
	<p><strong class="text-primary">Comentarios: </strong><?php echo $solicitud['motivo']; ?></p><?php }
	
	if($solicitud['evaluacion']!=NULL){?>
	<hr><p><strong class="text-primary">Evaluación: </strong>
	<?php 
	switch ($solicitud['evaluacion']){
		case 'E': echo "Excelente"; break;
		case 'B': echo "Bueno"; break;
		case 'R': echo "Regular"; break;
		case 'M': echo "Malo"; break;
	}?></p>
	
	<p><strong class="text-primary">Observaciones: </strong><?php echo $solicitud['obsEva']; ?></p><?php }?>
	</div>
</div>