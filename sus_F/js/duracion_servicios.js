function validar() {
	$("#formServicios").validate({
		rules: {
			11: {
				number: true,
				min: 1
			},
			21: {
				number: true,
				min: 1
			},
			22: {
				number: true,
				min: 1
			},
			31: {
				number: true,
				min: 1
			},
			32: {
				number: true,
				min: 1
			},
			33: {
				number: true,
				min: 1
			},
			34: {
				number: true,
				min: 1
			},
			35: {
				number: true,
				min: 1
			},
			41: {
				number: true,
				min: 1
			},
			42: {
				number: true,
				min: 1
			},
			43: {
				number: true,
				min: 1
			},
			51: {
				number: true,
				min: 1
			},
			52: {
				number: true,
				min: 1
			},
			53: {
				number: true,
				min: 1
			},
			54: {
				number: true,
				min: 1
			},
			61: {
				number: true,
				min: 1
			},
			62: {
				number: true,
				min: 1
			},
			63: {
				number: true,
				min: 1
			},
			64: {
				number: true,
				min: 1
			},
			65: {
				number: true,
				min: 1
			},
			66: {
				number: true,
				min: 1
			},
			67: {
				number: true,
				min: 1
			},
			68: {
				number: true,
				min: 1
			},
			71: {
				number: true,
				min: 1
			}
		},
		messages: {
			11: {				
				min: "El valor mínimo es 1"
			},
			21: {				
				min: "El valor mínimo es 1"
			},
			22: {				
				min: "El valor mínimo es 1"
			},
			31: {				
				min: "El valor mínimo es 1"
			},
			32: {				
				min: "El valor mínimo es 1"
			},
			33: {				
				min: "El valor mínimo es 1"
			},
			34: {				
				min: "El valor mínimo es 1"
			},
			35: {
				min: "El valor mínimo es 1"
			},
			41: {
				min: "El valor mínimo es 1"
			},
			42: {
				min: "El valor mínimo es 1"
			},
			43: {
				min: "El valor mínimo es 1"
			},
			51: {
				min: "El valor mínimo es 1"
			},
			52: {
				min: "El valor mínimo es 1"
			},
			53: {
				min: "El valor mínimo es 1"
			},
			54: {
				min: "El valor mínimo es 1"
			},
			61: {
				min: "El valor mínimo es 1"
			},
			62: {
				min: "El valor mínimo es 1"
			},
			63: {
				min: "El valor mínimo es 1"
			},
			64: {
				min: "El valor mínimo es 1"
			},
			65: {
				min: "El valor mínimo es 1"
			},
			66: {
				min: "El valor mínimo es 1"
			},
			67: {
				min: "El valor mínimo es 1"
			},
			68: {
				min: "El valor mínimo es 1"
			},
			71: {
				min: "El valor mínimo es 1"
			}
		}
	});
}

function actualizar() {
	$("#btnActualizar").one("click", function(e) {
		e.preventDefault();
		
		if ( $("#formServicios").valid() ) {		
			$.post(
				'administracion/actualizacion-de-duracion',
				$("#formServicios").serialize(),
				function(data) {
					$("#miDiv").load("administracion/duracion-de-servicios");
				}
			);
		}
	});
}

$(function() {
	validar();
	actualizar();
});