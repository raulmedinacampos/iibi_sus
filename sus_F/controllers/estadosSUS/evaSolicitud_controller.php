<?php
session_start();

$folio= (isset($_POST['folio'])) ? addslashes($_POST['folio']) : "";
$eva= (isset($_POST['eva'])) ? addslashes($_POST['eva']) : "";
$obsEva= (isset($_POST['obsEva'])) ? addslashes($_POST['obsEva']) : "";


$valores = "evaluacion='".$eva."', obsEva='".$obsEva."', estatus=11, fechaModif=now()";
$actualizar = actualizar("servicioSUS", $valores, "folio='".$folio."'");
?>