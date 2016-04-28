function actualizar() {
	$("#btnGuardar").one("click", function(e) {
		e.preventDefault();
		
		$.post(
			'administracion/actualiza-empleado',
			$("#formEmpleado").serialize(),
			function(data) {
				if(data==3)//tipoUsuario admin
					$("#miDiv").load("administracion/lista-de-usuarios");
				else
					//	if(data==1)	//tipoUsuario usuario	
					$("#miDiv").load("estadoSUS");
			}
		);
	});
}

$(function() {
	actualizar();
});