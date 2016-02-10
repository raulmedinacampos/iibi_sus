function inicializar() {
	//$(".datos-adicionales").css("display", "none");
	
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',
		language: 'es',
		orientation: 'top auto'
	});
}

function buscarEmpleado() {
	$("#btnBuscar").click(function(e) {
		e.preventDefault();
		
		var nombre = $("#nombre").val();
		var apPaterno = $("#apPaterno").val();
		var apMaterno = $("#apMaterno").val();
		
		$.post(
			'administracion/buscar-empleado', 
			{'nombre': nombre, 'apPaterno': apPaterno, 'apMaterno': apMaterno}, 
			function(data) {
				var d = jQuery.parseJSON(data);
				
				$("#myModal .modal-title").html('Alta de empleado');
				
				if ( d.encontrado == 0 ) {
					$("#myModal > div").addClass("modal-sm");
					$("#myModal .modal-body").html("<p>No se encontraron empleados similares. Favor de completar la información</p>");
					$("#myModal .modal-footer .btn-default").css("display", "inline");
					
					$(".btn-default").click(function() {
						$(".datos-adicionales").slideDown();
						$(".buscar").css("display", "none");
					});
				}
				
				if ( d.encontrado == 1 ) {
					$("#myModal .modal-body").html(d.datos);
					$("#myModal .modal-footer *").css("display", "none");
				}
				
				$("#myModal").modal('show');
			}
		);		
	});
}

function guardar() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
	});
}

$(function() {
	inicializar();
	//buscarEmpleado();
	guardar();
});