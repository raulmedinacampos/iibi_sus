<?php
$id = (isset($_POST['hdnId'])) ? addslashes($_POST['hdnId']) : "";

$actualizar = actualizar('usuarioSUS', 'fechaBaja=now(), estatus=0', 'idUsuario='.$id);
if ( $actualizar[0] == 0 )
	echo $actualizar[1];
?>