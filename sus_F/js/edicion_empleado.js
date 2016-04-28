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
			numCuenta: {
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

function actualizar() {
	$("#btnGuardar").one("click", function(e) {
		e.preventDefault();
		
		if ( $("#formEmpleado").valid() ) {
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
		}
	});
}

$(function() {
	validar();
	actualizar();
});