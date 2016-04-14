$(function() {
	$("#cambiar").click(function(e) {
		e.preventDefault();
		
		$(".modal-header .modal-title").html("Cambiar contraseña");
		$(".modal-body").html("¿Estás seguro de querer cambiar la contraseña?");
		$(".modal-footer .btn-default").html("Cancelar");
		$('#myModal .modal-footer .btn-default').css("display", "inline");
		$("#myModal").modal('show');
		
		$("#myModal .modal-footer .btn-primary").click(function() {
			$('#myModal .modal-footer .btn-primary').off('click');
			
			$.post('/ayuda/cambiar-contra/',
			 {'conf': 1},
			 function(data) {
					$("#myModal").modal('hide');
					
					$("#miDiv").load("/estado-sus/");
				}
			);
		});
	});
});