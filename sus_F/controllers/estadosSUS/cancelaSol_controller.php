<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$motivo=(isset($_POST['motivo'])) ? addslashes($_POST['motivo']) : "";

$valores = "motivo='".$motivo."', idUsuVerific=".$_SESSION['idUsuario'].", estatus=9, fechaModif=now()";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");
?>