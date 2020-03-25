<?php 

// registrar opciones, una por campo
function settings_whatsapp_orders(){	
	register_setting('opciones_grupo', 'label');
	register_setting('opciones_grupo', 'number_link');
	register_setting('opciones_grupo', 'background_button');
	register_setting('opciones_grupo', 'color_label');
}

/* Pagina settings */
function settings(){ ?>
	<div class="wrap">	
		<h1>Configuracion | Pedidos por WhatsApp</h1>
		<hr>
		<div class="notice notice-info is-dismissible"> 
			<p><strong>Plugin activado.</strong> Por favor configura los siguientes parametros:</p>
			<button type="button" class="notice-dismiss">
				<span class="screen-reader-text">Dismiss this notice.</span>
			</button>
		</div>	

		<p>Desde esta sección usted podrá configurar:</p>

		<form action="options.php" method="POST">

			<?php settings_fields('opciones_grupo'); ?>
			<?php do_settings_sections('opciones_grupo'); ?>

			<table class="form-table">

				<tr valign="top">
					<th scope="row">Texto del botón</th>
					<td><input required size="40" type="text" name="label" value="<?php echo esc_attr(get_option('label')); ?>" placeholder="Ingrese el texto"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Número de teléfono</th>
					<td><input required size="40" type="text" name="number_link" value="<?php echo esc_attr(get_option('number_link')); ?>" placeholder="Ingrese el número con el indicativo Ej: 570000000000"></td>
				</tr>
				<tr valign="top">
					<th scope="row">Background botón</th>
					<td><input class="jscolor {hash:true}" required size="40" name="background_button" value="<?php echo esc_attr(get_option('background_button')); ?>"></td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Color del texto</th>
					<td><input class="jscolor {hash:true}" required size="40" name="color_label" value="<?php echo esc_attr(get_option('color_label')); ?>"></td>
				</tr>

			</table>
			
			<?php submit_button(); ?>	

		</form>
	</div>
	<?php	
}