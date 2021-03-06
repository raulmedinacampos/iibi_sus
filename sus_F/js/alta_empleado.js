function inicializar() {
	$(".datos-adicionales").css("display", "none");
	
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',
		language: 'es',
		orientation: 'top auto'
	});
}

function buscarEmpleado() {
	$("#nombre, #apPaterno, #apMaterno").blur(function() {
		if( $("#hdnNE").val() == "" ) {
			var nombre = $("#nombre").val();
			var apPaterno = $("#apPaterno").val();
			var apMaterno = $("#apMaterno").val();
			
			$.post(
				'administracion/buscar-empleado', 
				{'nombre': nombre, 'apPaterno': apPaterno, 'apMaterno': apMaterno}, 
				function(data) {
					var idEmp = "";
					var d = jQuery.parseJSON(data);
					
					$("#myModal .modal-title").html('Alta de empleado');
					
					if ( d.encontrado == 0 ) {
						$("#myModal > div").addClass("modal-sm");
						$("#myModal .modal-body").html("<p>No se encontraron empleados similares. Favor de completar la información</p>");
						$("#myModal .modal-footer .btn-default").css("display", "inline");
						$("#myModal .modal-footer .btn-primary").css("display", "none");
						
						$(".inicial div.col-sm-2").addClass("col-sm-4").removeClass("col-sm-2");
						$(".inicial").addClass("form-group").removeClass("inicial");
						
						$(".btn-default").click(function() {
							$(".datos-adicionales").slideDown();
							$("#hdnNE").val("NE");
							$("#myModal").modal('hide');
						});
					}
					
					if ( d.encontrado == 1 ) {					
						$("#myModal > div").removeClass("modal-sm");
						$("#myModal .modal-body").html(d.datos);
						$("#myModal .modal-footer .btn-default").css("display", "none");
						$("#myModal .modal-footer .btn-primary").css("display", "inline");
						
						$(".inicial div.col-sm-2").addClass("col-sm-4").removeClass("col-sm-2");
						$(".inicial").addClass("form-group").removeClass("inicial");
						
						$(".detalle").css("display", "none");
						
						$('input[type="radio"]').click(function() {
							var radio = $(this);
							var seleccion = radio.parents("div").next(".detalle");
							idEmp = radio.data("id");
							
							$(".detalle").each(function() {
								if ( $(this).not(seleccion) ) {
									$(this).slideUp();
								}
							});
							
							seleccion.slideDown();
						});
						
						$(".btn-primary").click(function() {
							if ( $('input[type="radio"]').is(":checked") && idEmp ) {
								$.post(
									'administracion/buscar-info',
									{'id': idEmp},
									function(info) {
										var i = jQuery.parseJSON(info);
										
										$("#hdnId").val(i.idEmpleado);
										$("#nombre").val(i.nombre);
										$("#apPaterno").val(i.apellidoP);
										$("#apMaterno").val(i.apellidoM);
										$("#rfc").val(i.RFC);
										
										$(".datos-adicionales").slideDown();
										$("#myModal").modal('hide');
									}
								);
							}
						});
					}
					
					$("#myModal").modal('show');
				}
			);
		}
	});
}

function validar() {
	$.validator.addMethod( "pattern", function( value, element, param ) {
		if ( this.optional( element ) ) {
			return true;
		}
		if ( typeof param === "string" ) {
			param = new RegExp( "^(?:" + param + ")$" );
		}
		return param.test( value );
	}, "Formato inválido" );
	
	$("#formEmpleado").validate({
		rules: {
			nombre: {
				required: true,
				pattern: /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ\s]+$/i
			},
			apPaterno: {
				required: true,
				pattern: /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ\s]+$/i
			},
			apMaterno: {
				pattern: /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ\s]+$/i
			},
			telefono: {
				pattern: /^[\d\-\s]+$/
			},
			correo: {
				email: true
			},
			correoConf: {
				equalTo: "#correo"
			},
			area: {
				required: true
			},
			puesto: {
				required: true
			},
			numTrabajador: {
				number: true
			},
			telefonoOf: {
				required: true,
				pattern: /^[\d\-\s]+$/
			},
			correoPuesto: {
				email: true
			},
			correoPuestoConf: {
				equalTo: "#correoPuesto"
			},
			correoInst: {
				required: true,
				email: true
			},
			correoInstConf: {
				equalTo: "#correoInst"
			}
		},
		messages: {
			correoConf: "El correo no coincide",
			correoPuestoConf: "El correo no coincide",
			correoInstConf: {
				equalTo: "El correo no coincide"
			}
		}
	});
}

//data.toSource();						
function guardar() {
	$('#firma').fileupload({
		dataType: 'json',
		add: function (e, data) {
			data.context = $('#btnGuardar')
			.click(function(e) {
				e.preventDefault();
				
				if ( $("#formEmpleado").valid() ) {
					$.post(
						'administracion/guarda-empleado', 
						$("#formEmpleado").serialize(), 
						function(d) {
							if ( d != "0" ) {
								data.submit();}
						}
					);
				}
			});
		},
		always: function (e, data) {
			$("#miDiv").load("administracion/alta-de-usuario");}
	});
}

$(function() {
	inicializar();
	buscarEmpleado();
	validar();
	guardar();
});