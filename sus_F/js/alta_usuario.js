function inicializar() {
	$("#btnNuevoEmpleado").click(function(e) {
		e.preventDefault();
		
		$("#miDiv").load('administracion/alta-de-empleado');
	});
}

function autocompletar() {
	$('.typeahead').typeahead({
		displayKey: 'nombre',
		source: function(query, process) {
		    map = {};
			$.getJSON('listado-empleados',
					{'q': query},
					function(data) {
						objects = [];
						
						$.each(data, function(i, object) {
							map[object.nombre] = object;
							objects.push(object.nombre);
				        });
						
						process(objects);
					}
			);
		},
		updater: function(item) {
	        $("#hdn_id").val(map[item].id);
	        return item;
	    }
	}); 
}

function validar() {
	$("#formUsuario").validate({
		rules: {
			trabajador: {
				required: true
			},
			autoriza: {
				required: true
			},
			grupo: {
				required: true
			}
		}
	});
}

function guardar() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formUsuario").valid() ) {
			$.post(
				'administracion/guarda-usuario',
				$("#formUsuario").serialize(),
				function(data) {
					$("#miDiv").load("administracion/lista-de-usuarios");
				}
			);
		}
	});
}

$(function() {
	inicializar();
	autocompletar();
	validar();
	guardar();
})