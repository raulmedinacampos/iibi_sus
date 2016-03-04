<?php
session_start();

$grupo = seleccionarTodo("*","cTipoUsuarioSUS","estatus=1");

$data = array(
		'grupo' => $grupo
);

Flight::render('administracion/alta_usuario', $data);
?>