function actualizar() {
	$("#btnGuardar").one("click", function(e) {
		e.preventDefault();
		
		$.post(
			'administracion/actualiza-empleado',
			$("#formEmpleado").serialize(),
			function(data) {
				$("#miDiv").load("administracion/lista-de-usuarios");
			}
		);
	});
}

$(function() {
	actualizar();
});