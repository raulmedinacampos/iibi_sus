$(function(){
	$('#autenticar').validate({
		rules :{
			contrasenia : {
				required : true},
				
			usuario : {
				required : true,
 				minlength : 6}
		},
		 messages : {
			contrasenia : {
				required : "Por favor, ingrese su contraseña."},
				
			usuario : {
				required : "Por favor, ingrese su usuario.",
				minlength : "El usuario debe tener al menos 6 caracteres."}
		}
	}); 
 });
