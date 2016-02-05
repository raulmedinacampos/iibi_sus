<?php
session_start();

$grupo = seleccionarTodo("*","cGradoAcad","1 ORDER BY jerarquia, descripcion");

$data = array(
		'grupo' => $grupo
);

Flight::render('administracion/alta_usuario', $data);
?>