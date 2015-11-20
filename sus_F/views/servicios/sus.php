<script>
/* Carga inicial de contenido en el div */
function inicializar() {
	$('#formSolicitud').submit(function(e) {
        e.preventDefault();

        $.post(
                'guardaSUS',
                $('#formSolicitud').serialize(),
                function(data) {
                	$('#miDiv').html(data);
                }
        );
    });
}
/* Fin carga inicial */

$(function() {
	inicializar();
});
</script>
 
 <form action="guardaSUS" id="formSolicitud" name="formSolicitud"
	class="form-horizontal" method="post" accept-charset="utf-8">
	<table border="0">
		<tr>
			<td>Área solicitante</td>
			<td><?php echo (($area) ? $area['area'] : "");?></td>
		</tr>
		<tr>
			<td>Responsable del área solicitante</td>
			<td><?=$nomResponsable?></td>
		</tr>
	</table>
	<br /> Nombre del usuario <input type="text" name="nomSol"
		value="<?=$nomUsuario?>" /> <br>
		<label>Teléfono </label><?php echo (($empleado) ? $empleado['telOficina'] : ""); ?>


<br> Tipo de servicio: <br> Diversos <br> <input type="radio"
		name="servicio" value="11" /> Cafetería <br> <input type="radio"
		name="servicio" value="13" /> Otro <br> <input name="otro" type="text"
		value="Otro de diversos"> <br> <br> Servicio a inmueble <br> <input
		type="radio" name="servicio" value="61" checked="checked" />
	Albañilería <br> <br> Descripción del servicio <br>
	<textarea name="descripcion" cols="40" rows="3">DESCRIPCIÓN del servicio ÁÉÑ</textarea>
	<br> Detalle del servicio <br>
	<textarea name="detalle" cols="40" rows="3">DETALLE del servicio  ÁÉÑ</textarea>
	<br />

	<p class="nota">Nota: Es necesario elaborar una solcitud por cada
		servicio requerido</p>
	<input name="" type="submit" value="Solicitar autorización">
</form>