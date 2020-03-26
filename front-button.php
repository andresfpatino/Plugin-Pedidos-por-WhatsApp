<?php

// Oculamos el botón de añadir al carro
function remove_add_to_cart_button($product){  
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_add_to_cart_button');

//Evitar que se pueda comprar el producto
add_filter( 'woocommerce_is_purchasable', '__return_false');

// Agrega el botón de whatsapp
function cotiza_whatsapp() {
	global $product;
    // Api para mobile
    ?>
    <div class="haztupedido">
        <?php
        if ( wp_is_mobile() ) {
        ?>            
            <a style="background-color: <?php echo esc_html(get_option('background_button')); ?>; color: <?php echo esc_html(get_option('color_label')); ?>"
                href="https://api.whatsapp.com/send?phone=<?php echo esc_html(get_option('number_link')); ?>&text=Hola%21%21%21%20Estoy%20interesado%20en%20el%20producto:%20*<?php echo $product->get_name(); ?>*" target="_blank">
                <i class="fa fa-whatsapp"></i><span><?php echo esc_html(get_option('label')); ?></span>        
            </a>
        <?php
        // Api para desktop
        } else {
        ?>
            <a style="background-color: <?php echo esc_html(get_option('background_button')); ?>; color: <?php echo esc_html(get_option('color_label')); ?>"
                href="https://web.whatsapp.com/send?phone=<?php echo esc_html(get_option('number_link')); ?>&text=Hola%21%21%21%20Estoy%20interesado%20en%20el%20producto:%20*<?php echo $product->get_name(); ?>*" target="_blank">
                <i class="fa fa-whatsapp"></i><span><?php echo esc_html(get_option('label')); ?></span>        
            </a>
        <?php
        }
        ?>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'cotiza_whatsapp', 40 ); 