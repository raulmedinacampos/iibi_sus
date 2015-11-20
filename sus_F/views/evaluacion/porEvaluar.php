<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />
<p><br /><h3>Estado de solicitudes</h3></p>
  
	<?php
	session_start();
	require("../inc/consultas.inc.php");

	$seleccion=seleccionarTodo("folio","servicio","idSolicitante=".$_SESSION['idPersona']." and visible=1 and fechaLiberacion IS NOT NULL");
	if($row=mysqli_fetch_array($seleccion[1])){?>
        <table width="100%" border="0">
          <tr>
            <td align="center"><strong>Folio</strong></td>
            <td><strong>Tipo de solicitud</strong></td>
            <td><strong>Fecha de solicitud</strong></td>
            <td ><strong>Fecha de liberación</strong></td>
            <td><strong>Evaluar</strong></td>
          </tr><?php }
		  
	$columnas= "folio, servicio,
				DATE_FORMAT(fechaSolicitud,'%d/%m/%Y'),
				DATE_FORMAT(fechaLiberacion,'%d/%m/%Y')";

	$tablas=   "servicio, cTipoServicio";
	$condicion="servicio.idTipoServicio = cTipoServicio.idTipoServicio and  idSolicitante=".$_SESSION['idUsuario']." and visible=1 and fechaLiberacion IS NOT NULL";
	
	$seleccion=seleccionarTodo($columnas,$tablas,$condicion);	  
	
	while($row=mysqli_fetch_array($seleccion[1])){
		echo "<tr><td align='center'>".$row['folio']."</td><td>".$row['servicio']."</td><td>".$row['2']."</td><td>".$row['3']."</td><td>";?>
		
		<input name="idServicio" type="button" value="Evaluar servicio" />
		
		<?php echo "</td></tr>";
	}//while

	
		?>
</table>