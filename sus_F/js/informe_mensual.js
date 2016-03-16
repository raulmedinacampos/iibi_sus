function inicializar() {
	$(".oculto").css("display", "none");
}

function validar() {
	jQuery.validator.addMethod("fechaValida", function(value, element, param) {
		var anio = $(param).val();
		var fecha = new Date();
		var mesActual = fecha.getMonth()+1;
		var anioActual = fecha.getFullYear();
		
		if ( anio <= anioActual ) {
			return this.optional(element) || value <= mesActual;
		} else {
			return this.optional(element);
		}
	}, "Verifica que el mes seleccionado sea correcto");
	
	$("#formInforme").validate({
		rules: {
			mes: {
				required: true,
				fechaValida: "#anio"
			},
			anio: {
				required: true
			}
		},
		messages: {
			mes: "Seleccione un mes",
			anio: "Seleccione el año"
		}
	});
}

function consultarInforme() {
	$("#btnConsultar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formInforme").valid() ) {
			$.post(
				'reportes/infoMes-consultar',
				{'mes': $("#mes").val(), 'anio': $("#anio").val()},
				function(data) {
					if ( data == "1" ) {
						// Se encontró registro
						$("#formInforme").attr("action", "reportes/informe-mensual-pdf");
						$("#formInforme").attr("target", "_blank");
						$("#formInforme").submit();
					} else {
						// No hay registro, se muestra formulario
						$.post(
							'reportes/cargar-informe-mensual',
							{'mes': $("#mes").val(), 'anio': $("#anio").val()},
							function(data) {
								var d = jQuery.parseJSON(data);
								
								$("#tdCorrespS").html(d.correspS);
								$("#tdCorrespR").html(d.correspR);
								$("#hCorrespS").val(d.correspS);
								$("#hCorrespR").val(d.correspR);
								
								$("#tdFotocS").html(d.fotocS);
								$("#tdFotocR").html(d.fotocR);
								$("#hFotocS").val(d.fotocS);
								$("#hFotocR").val(d.fotocR);
								
								$("#tdEngarS").html(d.engarS);
								$("#tdEngarR").html(d.engarR);
								$("#hEngarS").val(d.engarS);
								$("#hEngarR").val(d.engarR);
								
								$("#tdMtoEqS").html(d.mtoEqS);
								$("#tdMtoEqR").html(d.mtoEqR);
								$("#hMtoEqS").val(d.mtoEqS);
								$("#hMtoEqR").val(d.mtoEqR);
								
								$("#tdMtoInmS").html(d.mtoInmS);
								$("#tdMtoInmR").html(d.mtoInmR);
								$("#hMtoInmS").val(d.mtoInmS);
								$("#hMtoInmR").val(d.mtoInmR);
								
								$("#tdMtoVehS").html(d.mtoVehiS);
								$("#tdMtoVehR").html(d.mtoVehR);
								$("#hMtoVehS").val(d.mtoVehiS);
								$("#hMtoVehR").val(d.mtoVehR);
								
								$("#tdTranspS").html(d.transpS);
								$("#tdTranspR").html(d.transpR);
								$("#hTranspS").val(d.transpS);
								$("#hTranspR").val(d.transpR);
								
								$("#tdLimpS").html(d.limpS);
								$("#tdLimpR").html(d.limpR);
								$("#hLimpS").val(d.limpS);
								$("#hLimpR").val(d.limpR);
								
								$("#tdSegS").html(d.segS);
								$("#tdSegR").html(d.segR);
								$("#hSegS").val(d.segS);
								$("#hSegR").val(d.segR);
								
								$("#tdTotalR").html(d.totalR);
								$("#tdTotalS").html(d.totalS);
								$("#hTotalR").val(d.totalR);
								$("#hTotalS").val(d.totalS);
								
								$(".oculto").slideDown();
							}
						);
					}
				}
			);
		}
	});
}

function guardar() {
	$("#btnEnviar").click(function(e) {
		e.preventDefault();
		
		$.post(
			'reportes/guarda-informe-mensual',
			$("#formInforme").serialize(),
			function(data) {
			}
		);
	});
}

$(function() {
	inicializar();
	validar();
	consultarInforme();
	guardar();
});