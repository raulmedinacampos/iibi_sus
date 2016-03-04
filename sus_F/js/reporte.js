function validar() {
jQuery.validator.addMethod("fechaValida", function(value, element, param) {
	var anio = $(param).val();
	var fecha = new Date();
	var mesActual = fecha.getMonth()+1;
	var anioActual = fecha.getFullYear();
	
	if ( anio <= anioActual ) {
		return this.optional(element) || value <= mesActual;
	} else {
		return this.optional(element);
	}
}, "Verifica que el mes seleccionado sea correcto");

	$("#formReporte").validate({
		rules: {
			mes: {
				required: true,
				fechaValida: "#anio"
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