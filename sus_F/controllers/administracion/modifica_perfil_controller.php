<?php
$id = (isset($_POST['id'])) ? addslashes($_POST['id']) : "";
$newPerfil = (isset($_POST['grupo'])) ? addslashes($_POST['grupo']) : "";

$actualizar = actualizar('usuarioSUS', 'tipoUsuario='.$newPerfil, 'idUsuario='.$id);
if ( $actualizar[0] == 0 )
	echo $actualizar[1];
?>