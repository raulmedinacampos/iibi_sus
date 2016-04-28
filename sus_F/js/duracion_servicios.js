function actualizar() {
	$("#btnActualizar").one("click", function(e) {
		e.preventDefault();
		
		$.post(
			'administracion/actualizacion-de-duracion',
			$("#formServicios").serialize(),
			function(data) {
				var msj;
				if(data==1)
					msj = "Se actualizó la duración de un servicio.";
				else
					msj = "Se actualizó la duración de "+data+" servicios.";

				alert(msj);
				$("#miDiv").load("administracion/duracion-de-servicios");
				
			}
		);
	});
}

$(function() {
	actualizar();
});