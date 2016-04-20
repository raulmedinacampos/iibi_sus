<?php
echo $id = (isset($_POST['id'])) ? addslashes($_POST['id']) : "";

$actualizar = actualizar('usuarioSUS', 'fechaBaja=now(), estatus=0', 'estatus= 1 and idUsuario='.$id);
if ($actualizar[0] == 0)
	echo $actualizar[1];

?>