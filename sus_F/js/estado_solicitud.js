function inicializar() {
	$("table a").click(function(e) {
		e.preventDefault();
		
		var folio = $(this).data("folio");
		
		$(".modal-header .modal-title").html("Solicitud de servicios");
		$(".modal-footer .btn-default").html("Cerrar");
		$(".modal-footer .btn-primary").css("display", "none");
		
		$.post(
			'detalleSUS',
			{'folio': folio},
			function(data) {
				$(".modal-body").html(data);
			}
		);
		$("#myModal").modal('show');
	});
}

$(function() {
	inicializar();
});