function inicializar() {
	$('table a').tooltip();
	
	$(".editar").click(function(e) {
		e.preventDefault();
		
		var id = $(this).data("id");
		
		$.post(
			'administracion/editar-empleado',
			{'id': id},
			function(data) {
				$("#myModal").modal('hide');
				
				$("#miDiv").html(data);
			}
		);
	});
	
	$(".administrar").click(function(e) {
		e.preventDefault();
		
		var id = $(this).data("id");
		
		$.post(
			'listado-grupos',
			function(data) {
				var datos = jQuery.parseJSON(data);
				var contenido = "";
				contenido += '<p>Seleccione el nuevo grupo al que pertenecerá el usuario</p>';
				contenido += '<select id="grupo" name="grupo" class="form-control">';
				contenido += '<option value="">Seleccione</option>';
				
				$.each(datos, function(i, obj) {
					contenido += '<option value="'+obj.id+'">'+obj.grupo+'</option>';
				});
				
				contenido += '</select>';
				
				$(".modal-header .modal-title").html("Modificar permisos de usuario");
				$(".modal-body").html(contenido);
				$(".modal-footer .btn-default").html("Cancelar");
				$('#myModal .modal-footer .btn-default').css("display", "inline");
				$("#myModal").modal('show');
				
				$("#myModal .modal-footer .btn-primary").click(function() {
					var grupo = $("#grupo option:selected").val();
					$('#myModal .modal-footer .btn-primary').off('click');
					
					$.post(
						'administracion/modificar-perfil-usuario',
						{'id': id, 'grupo': grupo},
						function(d) {
							$("#myModal").modal('hide');
							
							$("#miDiv").load("administracion/lista-de-usuarios");
						}
					);
				});
			}
		);
	});
	
	$(".eliminar").click(function(e) {
		e.preventDefault();
		
		var id = $(this).data("id");
		
		$(".modal-header .modal-title").html("Eliminar usuario");
		$(".modal-body").html("¿Está seguro de eliminar este usuario?");
		$(".modal-footer .btn-default").html("Cancelar");
		$('#myModal .modal-footer .btn-default').css("display", "inline");
		$("#myModal").modal('show');
		
		$("#myModal .modal-footer .btn-primary").click(function() {
			$('#myModal .modal-footer .btn-primary').off('click');
			
			$.post(
				'administracion/eliminar-usuario',
				{'id': id},
				function(data) {
					$("#myModal").modal('hide');
					alert("Usuario eliminado.");
					$("#miDiv").load("administracion/lista-de-usuarios");
				}
			);
		});
	});
}

$(function() {
	inicializar();
});