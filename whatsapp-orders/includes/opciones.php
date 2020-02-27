<?php 

include(RUTA.'/admin/settings.php');

// Añadir item de opciones al menu
function menu_administrador(){
	add_menu_page(
		'Pedidos por WhatsApp ',
		'Pedidos por WhatsApp ',
		'administrator',
		'pedidos_por_whatsapp', 
		'settings', // Callback
		plugins_url( 'whatsapp-orders/admin/icon.png' ),
		55
	);	
}

// El hook admin_menu ejecuta la funcion
add_action( 'admin_menu', 'menu_administrador' );

// Llamar el registro de las opciones en el submenu page settings
add_action('admin_menu', 'settings_whatsapp_orders');


?>