function detalleSUS(folio){
  var tamanio="resizable=1,left=60,top=60,width=780,height=500,scrollbars=1";
  window.open("./servicios/detalleSUS.php?folio="+folio+"","",tamanio);
}

function evaluarSUS(folio){
	$('#myModal .modal-dialog').removeClass('modal-sm');
	$('#myModal .modal-title').html('Cancelar solicitud');
	$('#myModal .modal-body').load('evaluacion/evaSolicitud');
	$('#myModal').modal('show');
	/*
  var tamanio="resizable=1,left=60,top=60,width=780,height=550,scrollbars=1";
  window.open("./evaluacion/evaSolicitud.php?folio="+folio+"","",tamanio);
	}*/
}

function cancelarSUS(folio){
	$('#myModal .modal-dialog').addClass('modal-sm');
	$('#myModal .modal-title').html('Cancelar solicitud');
	$('#myModal .modal-body').html('<p>¿Realmente desea cancelar esta solicitud?</p>');
	
	$('#myModal').modal('show');
	
	$('#myModal .modal-footer .btn-primary').click(function() {
		alert('Cancelado');
	});
   /*confirmar=confirm("¿Realmente desea cancelar esta solicitud?");
    if (!confirmar)
	  return false
    else
      location.href="cambioEdoSUS.php?folio="+folio+"&funcion=3&ruta=estadoSUS.jsp";}*/
}

/* Carga inicial de contenido en el div */
function inicializar() {
	$('#miDiv').load('sus');
}
/* Fin carga inicial */

/* Función para comportamiento del menú */
function inicializarMenu() {
	$('#cbp-tm-menu a').click(function(e) {
	    e.preventDefault();
	
	    var ruta = $(this).prop('href');
	    var segmentos = ruta.split("/");
	    
	    if ( ruta[ruta.length - 1] != "#" ) {
	    	$('#miDiv').load(ruta);
	    }
	    
	    if ( segmentos[segmentos.length - 1] == "salir" ) {
	    	window.location = "salir";
	    }
	});
}
/* Fin comportamiento menú*/

$(function() {
	inicializar();
	inicializarMenu();
});