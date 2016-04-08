function actualizar() {
	$("#btnActualizar").one("click", function(e) {
		e.preventDefault();
		
		$.post(
			'administracion/modifica_empleado',
			$("#formServicios").serialize(),
			function(data) {
				$("#miDiv").load("administracion/listado");
			}
		);
	});
}

$(function() {
	actualizar();
});