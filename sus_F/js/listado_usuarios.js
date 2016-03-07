function inicializar() {
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
}

$(function() {
	inicializar();
});