function cargarInfo() {
	$("#mes, #anio").change(function() {
		var mes = $("#mes").val();
		var anio = $("#anio").val();
		
		if ( mes && anio ) {
			$.post('reportes/cargar-informe-mensual',
					{'mes': mes, 'anio': anio},
					function(data) {
					}
			);
		}
	});
}

function guardar() {
	$("#btnEnviar").click(function(e) {
		e.preventDefault();
		
		$.post('reportes/guardar-informe-mensual',
				$("#formInforme").serialize(),
				function(data) {
				}
		);
	});
}

$(function() {
	cargarInfo();
	guardar();
});