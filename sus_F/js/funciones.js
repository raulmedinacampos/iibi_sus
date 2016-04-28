/* Carga inicial de contenido en el div */
function inicializar() {
	$('#miDiv').load('estadoSUS');
}
/* Fin carga inicial */

/* Función para comportamiento del menú */
function inicializarMenu() {
	$('#cbp-tm-menu a').click(function(e) {
	    e.preventDefault();
	
	    var ruta = $(this).prop('href');
	    var destino = $(this).prop('target');
	    var segmentos = ruta.split("/");
	    
	    if ( destino == "_blank" ) {
	    	window.open(ruta, "_blank");
	    	return;
	    }
	    
	    if ( segmentos[segmentos.length - 1] == "salir" ) {
	    	window.location = "salir";
	    	return;
	    }
	    
	    if ( ruta[ruta.length - 1] != "#" ) {
	    	$('#miDiv').load(ruta);
	    	return;
	    }
	});
}
/* Fin comportamiento menú*/

$(function() {
	inicializar();
	inicializarMenu();
});