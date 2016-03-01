function validar() {
	$("#formReporte").validate({
		rules: {
			mes: {
				required: true
			},
			anio: {
				required: true
			}
		}
	});
}

$(function() {
	validar();
});