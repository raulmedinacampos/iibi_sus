function actualizar() {
	$("#btnActualizar").one("click", function(e) {
		e.preventDefault();
		
		$.post(
			'administracion/actualizacion-de-duracion',
			$("#formServicios").serialize(),
			function(data) {
				$("#miDiv").load("administracion/duracion-de-servicios");
			}
		);
	});
}

$(function() {
	actualizar();
});