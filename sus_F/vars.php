<?php
session_start();

foreach($_SESSION as $key =>$valor)
{
	echo "variable: $key = $valor <br>";
}

echo $str = "cadena Ññáéíóú.  ....!#$%&";
	$str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	echo $nuevo = preg_replace("/[^A-Za-z0-9]/", '', $str);

?>