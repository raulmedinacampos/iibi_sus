function actualizar() {
	$("#btnAdministrativo").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#administrativo").val();
	});
	
	$("#btnServiciosGenerales").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#serviciosGenerales").val();
	});
	
	$("#btnPersonal").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#personal").val();
	});
	
	$("#btnPresupuesto").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#presupuesto").val();
	});
}

$(function() {
	actualizar();
});