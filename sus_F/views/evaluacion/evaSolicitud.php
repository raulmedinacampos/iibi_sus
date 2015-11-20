<div class="servicios">
	<div class="titulo">Evaluación de satisfacción del servicio</div>
	
	<br /><strong>Área solicitante: </strong><?=$area['area']?>
	<br /><strong>Responsable del área solicitante: </strong><?=$nomResponsable?>
	<br /><strong>Nombre del usuario: </strong><?=$nomUsuario?>
	<br /><strong>Teléfono: </strong><?php echo $empleado['telOficina'];?>	  
	
	<div class="subtitulo">Detalles del servicio solicitado</div>
	
	<?php
	if ( $row = mysqli_fetch_array($seleccion[1]) ) {
	?>
	<table border="0">
		<tr>
			<td align="center"><strong>Folio</strong></td>
            <td align="center"><strong>Detalles</strong></td>
            <td align="center"><strong>Fecha de autorización</strong></td>
            <td align="center"><strong>Fecha de liberación</strong></td>
        </tr>
        <tr>
          	<td align='center'><?=$row['folio']?></td>
            <td><?=$row['servicio'].". ".$row['descripcion']?></td>
            <td><?=$row['fechaA']?></td>
            <td><?=$row['fechaL']?></td>
        </tr>
	</table>
	<?php
	}//if
	?>

	<form action="guardaEvaSUS.php" method="post">
		<div class="subtitulo">¿Cómo califica el servicio recibido?</div>
		<table cellpadding="15" >
			<tr>
				<td><input name="evaluacion" type="radio" value="E" checked="checked" /> Excelente</td>
		  		<td><input name="evaluacion" type="radio" value="B" /> Bueno</td>
		  		<td><input name="evaluacion" type="radio" value="R" /> Regular</td>
		  		<td><input name="evaluacion" type="radio" value="M" /> Malo</td>
		  	</tr>
		</table>
		<input name="folio" type="hidden" value="<?=$folio?>" />
		<table cellpadding="15">
			<tr>
				<td>Si lo desea, puede escribir un comentario al respecto.<br />
					<textarea name="obsEva" cols="60" rows="7">OBSERVACIONES SADFASDFAS</textarea>
				</td>
			</tr>
		</table>
		<span align="center">
			<input class="submit" onclick="window.close();" type="button" value="Cancelar" />
			<input class="submit" name="enviar" type="submit" value="Evaluar servicio" />
		</span>
	</form>
</div>
