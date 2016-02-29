function inicializar() {
	$("table a").click(function(e) {
		e.preventDefault();
		
		var folio = $(this).data("folio");
		
		$(".modal-header .modal-title").html("Solicitud de servicios");
		$(".modal-footer .btn-default").html("Cerrar");
		$(".modal-footer .btn-primary").css("display", "none");
		
		$.post(
			'detalleSUS',
			{'folio': folio},
			function(data) {
				$(".modal-body").html(data);
			}
		);
		$("#myModal").modal('show');
	});
	
	
	/*
	 * Definición de las acciones sobre las solicitudes
	 */
	
	$(".btn-evaluar").click(function(e) {
		e.preventDefault();
		
		$("#myModal").load(
			'sus/evaluar-solicitud', 
			function() {
				$("#myModal").modal('show');
			}
		);
	});
	
	$(".btn-validar").click(function(e) {
		e.preventDefault();
		
		$.post(
			'sus/validar-solicitud', 
			{'folio': $(this).data('id')}, 
			function(data) {
				$('#myModal .modal-title').html('Validar solicitud');
				$('#myModal .modal-body').html(data);
				$('#myModal .modal-footer .btn-default').html("Cerrar");
				$('#myModal .modal-footer .btn-primary').css("display", "none");
				
				$("#myModal").modal('show');
				
				$('#myModal .modal-footer .btn-default').click(function() {
					$("#miDiv").load("estadoSUS");
				});
			}
		);
	});
	
	$(".btn-cancelar").click(function(e) {
		e.preventDefault();
		
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
		$('#myModal .modal-footer .btn-primary').html("Cancelar");
		$('#myModal .modal-footer .btn-primary').css("display", "inline");
		
		$('#myModal').modal('show');
	});
	
	$(".btn-terminar").click(function(e) {
		e.preventDefault();
		
		$.post(
			'sus/terminar-solicitud', 
			{'folio': $(this).data('id')}, 
			function(data) {
				$('#myModal .modal-title').html('Terminar solicitud');
				$('#myModal .modal-body').html(data);
				$('#myModal .modal-footer .btn-default').html("Cerrar");
				$('#myModal .modal-footer .btn-primary').css("display", "none");
				
				$("#myModal").modal('show');
				
				$('#myModal .modal-footer .btn-default').click(function() {
					$("#miDiv").load("estadoSUS");
				});
			}
		);
	});
	
	$(".btn-archivar").click(function(e) {
		e.preventDefault();
		
		$.post(
			'sus/archivar-solicitud', 
			{'folio': $(this).data('id')}, 
			function(data) {
				$('#myModal .modal-title').html('Archivar solicitud');
				$('#myModal .modal-body').html(data);
				$('#myModal .modal-footer .btn-default').html("Cerrar");
				$('#myModal .modal-footer .btn-primary').css("display", "none");
				
				$("#myModal").modal('show');
				
				$('#myModal .modal-footer .btn-default').click(function() {
					$("#miDiv").load("estadoSUS");
				});
			}
		);
	});
}

$(function() {
	inicializar();
});