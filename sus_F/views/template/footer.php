
		<div class="pie">
			<div class="derechos">
				Hecho en México, todos los derechos reservados 2014. Esta página puede
				ser reproducida con fines no lucrativos, siempre y cuando no se
				mutile, se cite la fuente completa y su dirección electrónica. De otra
				forma, requiere permiso previo por escrito de la institución. <a
					href="creditos.php">Créditos</a>
			</div>
			<div class="administrado">
				<a href="#">Ubicación</a>: Circuito Interior s/n, Torre II de
				Humanidades, pisos 11, 12 y 13, Ciudad Universitaria, C.P. 04510, Del.
				Coyoacán, México, Cd. Mx.<br /> Sitio web administrado por:
				Instituo de Investigaciones Bibiotecológicas y de la Información. <a
					href="mailto:tecnica@iibi.unam.mx">Informes</a>
			</div>
		</div> <!--termina pie derechos-->
	</div> <!-- Termina contenedor -->
	<?php
	if (isset ( $js )) {
		foreach ( $js as $val ) {
			?>
	<script type="text/javascript" src="<?php echo 'js/'.$val.'.js'; ?>"></script>
	<?php
		}
	}
	?>
</body>
</html>