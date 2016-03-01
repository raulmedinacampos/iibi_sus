<?php
session_start ();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";

$valores ='cTipoServicio.idTipoServicio = servicioSUS.idTipoServicio and folio = "'.$folio.'"';
$consulta =seleccionar('duracionEstimada','cTipoServicio,servicioSUS',$valores);
$duracionE=$consulta['duracionEstimada'];

$valores = "fechaVerific = now(), fechaCompromiso = now() + interval ".$duracionE." day, idUsuVerific=" . $_SESSION ['idUsuario'] . ", estatus=8, fechaModif=now()"; //fechaCompromiso =
/* Falta función para calcular la fecha compromiso días hábiles  */
$actualizar = actualizar ( "servicioSUS", $valores, "folio='" . $folio . "'" );

//	Si se realizó arreglo[0] = 1, arreglo[1] = numero de columnas afectadas
if ($actualizar [0] == 1 and $actualizar[1]==1) 
	echo "1";
else
	echo "0";
?>