function inicializar() {
	$("table a").click(function(e) {
		e.preventDefault();
		
		var id = $(this).data("id");
		
		$(".modal-title").html("Editar usuario");
		$(".modal-body").html("¿Está seguro de que desea editar la información del usuario?");
		
		$("#myModal").modal('show');
		
		$(".modal-footer .btn-primary").click(function() {
			$.post(
				'administracion/editar-empleado',
				{'id': id},
				function(data) {
					$("#myModal").modal('hide');
					
					$("#miDiv").html(data);
				}
			);
		});
	});
}

$(function() {
	inicializar();
});