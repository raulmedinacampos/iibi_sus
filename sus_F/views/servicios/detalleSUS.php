<link href="../css/servicios.css" rel="stylesheet" type="text/css" media="screen" />
  
	<?php
	session_start();
	$folio=$_GET['folio'];
	require("../inc/consultas.inc.php");

	$columnas="*, DATE_FORMAT(fechaSolicitud,'%d/%m/%Y') as fechaS, DATE_FORMAT(fechaAprob,'%d/%m/%Y') as fechaA, left(idTipoServicio,1) as tipo";
	
	$solicitud=seleccionar($columnas,"servicioSUS","folio = '".$folio."'");
	$empleado = seleccionar('*','empleado',"idEmpleado=".$_SESSION['idEmpleado']);
	$responsable = seleccionar('*','empleado',"idEmpleado=".$_SESSION['idUAutoriza']);
	$area= seleccionar('area','cArea,puesto,empleado','cArea.idArea = puesto.idArea and puesto.estatus = 1 and puesto.idEmpleado = empleado.idEmpleado and empleado.idEmpleado = '.$_SESSION['idUAutoriza']);
	$estado= seleccionar('estatus','cEstatusSUS','idEstatusSUS='.$solicitud['estatus']);

$nomUsuario = $empleado['gradoAcad']." ".$empleado['nombre']." ".$empleado['apellidoP']." ".$empleado['apellidoM'];
$nomResponsable =  $responsable['gradoAcad']." ".$responsable['nombre']." ".$responsable['apellidoP']." ".$responsable['apellidoM'];?>

	
     <table border="0" cellpadding="4" width="100%" align="center" >
      <tr><td colspan="5" align="center"><div class="titulo">Solicitud de servicios</div></td></tr>
      <tr><td colspan="2"><strong>Folio </strong><?=$folio;?></td>
          <td colspan="2"><strong>Fecha de solicitud </strong><?=$solicitud['fechaS'];?></td>
          <td><strong>Fecha de autorización </strong><?=$solicitud['fechaA'];?></td></tr>
      
      <tr><td><strong>Responsable y área solicitante</strong></td>
        <td>&nbsp;</td>
          <td colspan="3"><?=$nomResponsable.", ".$area['area']."."?></td></tr>

      <tr><td colspan="2"><strong>Nombre del usuario</strong></td>
          <td><?=$nomUsuario?></td>
          <td>&nbsp;</td>
          <td ><strong>Teléfono: </strong><?=$empleado['telOficina']?></td></tr></table>

    <div class="servicios"><?
	
	switch($solicitud['tipo']){
		
		case 1:		$titulo = '<div class="titulo">Servicios diversos</div>'; break;
		case 2: 	$titulo = '<div class="titulo">Servicio de correspondencia</div>';break;	
		case 3: 	$titulo = '<div class="titulo">Mantenimiento a equipo, mobiliario y vehículos</div>';break;	
		case 4: 	$titulo = '<div class="titulo">Reproducción y engargolado</div>';break;	
		case 5: 	$titulo = '<div class="titulo">Transporte</div>';break;	
		case 6: 	$titulo = '<div class="titulo">Servicio a inmueble</div>';break;	
		case 7: 	$titulo = '<div class="titulo">Vigilancia</div>';break;	
		default:	$titulo = '<div class="titulo">Otros servicios</div>';break;
		}?>
    
      <table cellpadding="10" width="100%" align="center" >
        <tr><td align="center" colspan="2"><?=$titulo?></td></tr>
        <tr><td width="25%">Servicio requerido</td><td width="75%"  bgcolor="#E0E0E0"><?=$solicitud['descripcion']?></td></tr>
        <tr><td>Descripción</td><td  bgcolor="#E0E0E0"><?=$solicitud['detalle']?></td></tr>
        <tr><td>Estado</td><td  bgcolor="#E0E0E0"><?=$estado['estatus']?></td></tr>
      </table>

      <input class="submit" type="button" value="Cerrar" onclick="window.close();"/>
	
	<?
	
	switch($_SESSION['tipoUsuario']){
		
	case 2: // autorizador 
	{ ?>
    <form action="guardaSUS.php" method="post" id="fServicio"  >
        <table width="100%" >
         <td width="25%"><input class="submit" name="noAutorizar" type="button" value="No autorizar" /></td>
         <td><input class="submit" name="enviar" type="button" value="Autorizar" /></td></tr>
        </table>
    </form><?
	break;}
	
	case 3: //servicios generales
	{?>
	<form action="guardaSUS.php" method="post" id="fServicio"  >
        <table width="100%" >
         <td width="25%"><input class="submit" name="cancelarSol" type="button" value="Cancelar solicitud" /></td>
         <td width="25%"><input class="submit" name="regresarAlUsuario" type="button" value="No autorizar" /></td>
         <td><input class="submit" name="enviar" type="button" value="Validar" /></td></tr>
        </table>
    </form> <?
	break; }
	
    case 4: // jefe presupuesto
	{?>
	<form action="guardaSUS.php" method="post" id="fServicio"  >
        <table width="100%" >
         <td width="25%"><input class="submit" name="faltaSufP" type="button" value="Cancelar por insuficiencia presupuestal" /></td>
         <td><input class="submit" name="enviar" type="button" value="Asignar suficiencia presupuestal" /></td></tr>
        </table>
    </form> <? }    	
	}
	
	?>
	
	
    
    
    
   
    

  


    </div>




