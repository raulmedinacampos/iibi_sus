function detalleSUS(folio){
  var tamanio="resizable=1,left=60,top=60,width=780,height=500,scrollbars=1";
  window.open("./servicios/detalleSUS.php?folio="+folio+"","",tamanio);
}

function evaluarSUS(folio){
	$('#myModal .modal-dialog').removeClass('modal-sm');
	$('#myModal .modal-title').html('Cancelar solicitud');
	$('#myModal .modal-body').load('evaluacion/evaSolicitud');
	$('#myModal .modal-footer .btn-primary').html("Evaluar servicio");
	
	$('#myModal').modal('show');
	
	$('#myModal .modal-footer .btn-primary').click(function() {
		$.post(
				'evaSolicitud',
				{folio: folio},
				function(data) {
					alert("Enviando");
				}
		);
	});
}

function cancelarSUS(folio) {
	var contenido = '<p>¿Realmente desea cancelar esta solicitud?</p>';
	contenido += '<div class="form-group">';
	contenido += '<label>Motivo de cancelación</label>';
	contenido += '<select id="motivo" name="motivo" class="form-control">';
	contenido += '<option value="">Seleccione</option>';
	contenido += '<option value="Cancelada por el usuario">Cancelada por el usuario</option>';
	contenido += '<option value="Falta de presupuesto">Falta de presupuesto</option>';
	contenido += '<option value="Falta de personal">Falta de personal</option>';
	contenido += '<option value="Inconsistencia al llenar solicitud">Inconsistencia al llenar solicitud</option>';
	contenido += '</select>';
	contenido += '</div>';  //.form-group
	contenido += '<div class="form-group">';
	contenido += '<label>Observaciones</label>';
	contenido += '<textarea id="obsCancelacion" name="obsCancelacion" class="form-control" rows="3"></textarea>';
	contenido += '</div>';  //.form-group
	
	$('#myModal .modal-title').html('Cancelar solicitud');
	$('#myModal .modal-body').html(contenido);
	$('#myModal .modal-footer .btn-default').html("No cancelar");
	$('#myModal .modal-footer .btn-primary').html("Archivar");
	
	$('#myModal').modal('show');
	
	$('#myModal .modal-footer .btn-primary').click(function() {
		$.post(
				'cambioEdoSUS',
				{folio: folio},
				function(data) {
					alert("Cancelado");
				}
		);
	});
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