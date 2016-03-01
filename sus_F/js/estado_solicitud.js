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
		
		var folio = $(this).data("id");
		
		var contenido = '<form id="formEvaluacion" name="formEvaluacion">';
		contenido += '<p>¿Cómo evaluas el servicio recibido?</p>';
		contenido += '<div class="form-group">';
		contenido += '<label>Calificación</label><br />';
		contenido += '<label class="radio-inline"><input type="radio" name="evaluacion" value="E" /> Excelente</label>';
		contenido += '<label class="radio-inline"><input type="radio" name="evaluacion" value="B" /> Bueno</label>';
		contenido += '<label class="radio-inline"><input type="radio" name="evaluacion" value="R" /> Regular</label>';
		contenido += '<label class="radio-inline"><input type="radio" name="evaluacion" value="M" /> Malo</label>';
		contenido += '<div class="msg"></div>';
		contenido += '</div>';  //.form-group
		contenido += '<div class="form-group">';
		contenido += '<label>Observaciones</label>';
		contenido += '<textarea id="observaciones" name="observaciones" class="form-control" rows="3"></textarea>';
		contenido += '</div>';  //.form-group
		contenido += '</form>';
		
		$('#myModal .modal-title').html('Cancelar solicitud');
		$('#myModal .modal-body').html(contenido);
		$('#myModal .modal-footer .btn-default').html("Cancelar");
		$('#myModal .modal-footer .btn-primary').html("Aceptar");
		$('#myModal .modal-footer .btn-primary').css("display", "inline");
		
		$('#myModal').modal('show');
		
		$("#formEvaluacion").css("margin", "auto");
		
		$("#formEvaluacion").validate({
			errorPlacement: function(error, element) {
			    if (element.attr("name") == "evaluacion" )
			        error.insertAfter(".msg");
			    else
			        error.insertAfter(element);
			},
			rules: {
				evaluacion: {
					required: true
				},
				observaciones: {
					required: true
				}
			}
		});
		
		$('#myModal .modal-footer .btn-primary').click(function() {
			if ( $("#formEvaluacion").valid() ) {
				$('#myModal .modal-footer .btn-primary').off('click');
				$.post(
					'sus/evaluar-solicitud',
					{'folio': folio, 'eva': $("input[type=radio]:checked").val(), 'obsEva': $("#observaciones").val()},
					function(data) {
						$("#miDiv").load("estadoSUS");
						$('#myModal').modal('hide');
					}
				);
			}
		});
		
		$('#myModal .modal-footer .btn-default').click(function() {
			$('#myModal').modal('hide');
		});
	});
	
	$(".btn-validar").click(function(e) {
		e.preventDefault();
		
		$(this).prop("disabled", "disabled");
		
		$.post(
			'sus/validar-solicitud', 
			{'folio': $(this).data('id')}, 
			function(data) {
				$('#myModal .modal-title').html('Validar solicitud');
				$('#myModal .modal-body').html(data);
				$('#myModal .modal-footer .btn-default').html("Cerrar");
				$('#myModal .modal-footer .btn-primary').css("display", "none");
				
				$("#myModal").modal('show');
				
				$('#myModal .modal-footer .btn-default').one('click', function() {
					$("#miDiv").load("estadoSUS");
				});
			}
		);
	});
	
	$(".btn-cancelar").click(function(e) {
		e.preventDefault();
		
		var folio = $(this).data("id");
		
		var contenido = '<form id="formCancelacion" name="formCancelacion">';
		contenido += '<p>¿Realmente desea cancelar esta solicitud?</p>';
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
		contenido += '</form>';
		
		$('#myModal .modal-title').html('Cancelar solicitud');
		$('#myModal .modal-body').html(contenido);
		$('#myModal .modal-footer .btn-default').html("No cancelar");
		$('#myModal .modal-footer .btn-primary').html("Cancelar");
		$('#myModal .modal-footer .btn-primary').css("display", "inline");
		
		$('#myModal').modal('show');
		
		$("#formCancelacion").css("margin", "auto");
		
		$("#formCancelacion").validate({
			rules: {
				motivo: {
					required: true
				}
			}
		});
		
		$('#myModal .modal-footer .btn-primary').click(function() {
			if ( $("#formCancelacion").valid() ) {
				$('#myModal .modal-footer .btn-primary').off('click');
				$.post(
					'sus/cancelar-solicitud',
					{'folio': folio, 'motivo': $("#motivo").val()},
					function(data) {
						$("#miDiv").load("estadoSUS");
						$('#myModal').modal('hide');
					}
				);
			}
		});
		
		$('#myModal .modal-footer .btn-default').click(function() {
			$('#myModal').modal('hide');
		});
	});
	
	$(".btn-terminar").click(function(e) {
		e.preventDefault();
		
		var folio = $(this).data("id");
		
		var contenido = '<form id="formTerminar" name="formTerminar">';
		contenido += '<p>¿Realmente desea finalizar esta solicitud?</p>';
		contenido += '<div class="form-group">';
		contenido += '<label>Comentarios</label>';
		contenido += '<textarea id="comentarios" name="comentarios" class="form-control" rows="3"></textarea>';
		contenido += '</div>';  //.form-group
		contenido += '</form>';
		
		$('#myModal .modal-title').html('Terminar solicitud');
		$('#myModal .modal-body').html(contenido);
		$('#myModal .modal-footer .btn-default').html("Cancelar");
		$('#myModal .modal-footer .btn-primary').html("Aceptar");
		$('#myModal .modal-footer .btn-primary').css("display", "inline");
		
		$('#myModal').modal('show');
		
		$("#formTerminar").css("margin", "auto");
		
		$("#formTerminar").validate({
			rules: {
				comentarios: {
					required: true
				}
			}
		});
		
		$('#myModal .modal-footer .btn-primary').click(function() {
			if ( $("#formTerminar").valid() ) {
				$('#myModal .modal-footer .btn-primary').off('click');
				$.post(
					'sus/terminar-solicitud',
					{'folio': folio, 'obs': $("#comentarios").val()},
					function(data) {
						$("#miDiv").load("estadoSUS");
						$('#myModal').modal('hide');
					}
				);
			}
		});
		
		$('#myModal .modal-footer .btn-default').click(function() {
			$('#myModal').modal('hide');
		});
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
				
				$('#myModal .modal-footer .btn-default').one('click', function() {
					$("#miDiv").load("estadoSUS");
				});
			}
		);
	});
	
	$(".btn-pdf").click(function(e) {
		e.preventDefault();
		
		var folio = $(this).data('folio');
		
		$("#hNuevaSolicitud").val(folio);
		$("#formPDF").submit();
	});
}

$(function() {
	inicializar();
});