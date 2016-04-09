<?php
$id = (isset($_POST['hdnId'])) ? addslashes($_POST['hdnId']) : "";
$newPerfil = (isset($_POST['newPerfil'])) ? addslashes($_POST['newPerfil']) : "";

$actualizar = actualizar('usuarioSUS', 'tipoUsuario='.$newPerfil, 'idUsuario='.$id);
if ( $actualizar[0] == 0 )
	echo $actualizar[1];
?>