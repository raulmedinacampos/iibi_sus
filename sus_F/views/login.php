
<div id="mensaje">
<?php
if ($verifica == 10) {
?>
	<p>Verifique sus datos o comuníquese con el administrador</p>
<?php
} else echo "&nbsp;";
?>
</div>

<form id="autenticar" class="contacto" action="verifica" method="post">
	<fieldset>
		<legend>Bienvenido a la Solicitud Única de Servicios</legend>
		<table align="center" width="200" border="0">
			<tr>
				<td width="25%">Usuario</td>
				<td><input name="usuario" type="text" id="idUsuario" value="" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Contraseña&nbsp;&nbsp;</td>
				<td><input name="contrasenia" type="password" id="idContra" value=""
					maxlength="6" /></td>
			</tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="submit" type="submit"
					value="Entrar" /></td>
			</tr>
		</table>
		<br />
		<input type="hidden" name="formulario" value="index" />
	</fieldset>
</form>