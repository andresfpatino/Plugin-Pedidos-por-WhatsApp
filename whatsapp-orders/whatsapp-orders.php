<?php
/**
 * Plugin Name: Pedidos por WhatsApp 
 * Plugin URI:  https://ecore.com.co
 * Description: Cambia todos los productos a un botón "Pedidos por Whatsapp" en vez de agregar al carrito de compras.
 * Version:     1.0
 * Author:      Andrés Felipe Patiño
 * Author URI:  https://ecore.com.co
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


defined('ABSPATH') or die("Bye bye");
define('RUTA',plugin_dir_path(__FILE__));

// Add menu page
include(RUTA.'/includes/opciones.php');

// Logica de la landing
require_once(RUTA.'/front-button.php');


// Registra cargar de scripts en el admin
function plugin_scripts() {
    wp_enqueue_style('pedido-whatsapp', plugin_dir_url( __FILE__ ).'includes/css/pedido-whatsapp.css', '', '1.0');
}
add_action('wp_enqueue_scripts', 'plugin_scripts');

function admin_scripts() {
    wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ).'includes/font-awesome/css/font-awesome.min.css', '', '4.7.0');
}
add_action('admin_enqueue_scripts', 'admin_scripts');


// Redirige a la página de opciones, luego de activar el plugin
function activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=pedidos_por_whatsapp' ) ) );
    }
}
add_action( 'activated_plugin', 'activation_redirect' );