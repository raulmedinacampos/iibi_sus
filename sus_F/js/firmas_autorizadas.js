function autocompletar() {
	$('#administrativo').typeahead({
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
	        $("#hdn_id_strio").val(map[item].id);
	        return item;
	    }
	});
	
	$('#serviciosGenerales').typeahead({
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
	        $("#hdn_id_sg").val(map[item].id);
	        return item;
	    }
	});
}

function validar() {
	$("#formFirmas").validate({
		ignore: ""
	});
}

function actualizar() {
	$("#btnAdministrativo").click(function(e) {
		e.preventDefault();
		
		var anterior = $("#id_strio_ant").val();
		var nuevo = $("#hdn_id_strio").val();
		
		$("#hdn_id_strio").rules("add", {
			required: true
		});
		
		if ( $("#formFirmas").valid() ) {
			$('btnAdministrativo').off('click');
			$.post(
				'administracion/actualiza-firmas', 
				{'id_srio_ant':anterior, 'hdn_id_srio':nuevo}, 
				function(data) {
					$(".modal-header .modal-title").html("Firmas autorizadas");
					$(".modal-footer .btn-default").html("Cerrar");
					$(".modal-footer .btn-primary").css("display", "none");
					$(".modal-body").html(data);
					$("#myModal").modal('show');
					
					$("#myModal .modal-footer .btn-default").click(function() {
						$("#myModal").modal('hide');
							
						$("#miDiv").load("administracion/firmas-autorizadas");
					});
				}
			);
		}
	});
	
	$("#btnServiciosGenerales").click(function(e) {
		e.preventDefault();
		
		var anterior = $("#id_sg_ant").val();
		var nuevo = $("#hdn_id_sg").val();
		
		$("#hdn_id_sg").rules("add", {
			required: true
		});
		
		if ( $("#formFirmas").valid() ) {
			$('btnServiciosGenerales	').off('click');
			$.post(
				'administracion/actualiza-firmas', 
				{'id_sg_ant':anterior, 'hdn_id_sg':nuevo}, 
				function(data) {
					$(".modal-header .modal-title").html("Firmas autorizadas");
					$(".modal-footer .btn-default").html("Cerrar");
					$(".modal-footer .btn-primary").css("display", "none");
					$(".modal-body").html(data);
					$("#myModal").modal('show');
					
					$("#myModal .modal-footer .btn-default").click(function() {
						$("#myModal").modal('hide');
							
						$("#miDiv").load("administracion/firmas-autorizadas");
					});
				}
			);
		}
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
	validar();
	actualizar();
});