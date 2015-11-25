<?php
	session_start();
	
	$header['css'][] = 'menu_component';
		
	$header['js'][] = 'menu_modernizr.custom';
	$header['js'][] = 'funciones';
	
	$footer['js'][] = 'menu_cbpTooltipMenu.min';
	$footer['js'][] = 'menu';
	
	Flight::render('template/header', $header);
	Flight::render('principal');
	Flight::render('template/footer', $footer);
?>