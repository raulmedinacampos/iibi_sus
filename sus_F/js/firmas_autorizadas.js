function autocompletar() {
	$('.typeahead').typeahead({
		displayKey: 'nombre',
		source: function(query, process) {
		    map = {};
			$.getJSON('listado-firmas',
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

function actualizar() {
	$("#btnAdministrativo").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#administrativo").val();
	});
	
	$("#btnServiciosGenerales").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#serviciosGenerales").val();
	});
	
	$("#btnPersonal").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#personal").val();
	});
	
	$("#btnPresupuesto").click(function(e) {
		e.preventDefault();
		
		var nuevo = $("#presupuesto").val();
	});
}

$(function() {
	autocompletar();
	actualizar();
});