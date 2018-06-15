<?php
    add_action( 'woocommerce_shop_loop_item_title', 'dtwc_item_title', 1 );
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

    function dtwc_item_title() {
        echo '<h3 class="wc-item-title">' . get_the_title() . '</h3>';
    }

    add_filter( 'woocommerce_product_tabs', 'dtwc_remove_product_tabs', 98 );
 
    function dtwc_remove_product_tabs( $tabs ) {
        unset( $tabs['additional_information'] ); 
        return $tabs;
    }

    //  Change number or products per row to 3
    add_filter( 'loop_shop_columns', 'dtwc_loop_columns');
    
    function dtwc_loop_columns() {
        return 3; // 3 products per row
    }

    add_action('add_to_cart_redirect', 'dtwc_resolve_dupes_add_to_cart_redirect');

    function dtwc_resolve_dupes_add_to_cart_redirect( $url = false ) {

        // If another plugin beats us to the punch, let them have their way with the URL
        if(!empty($url)) { return $url; }

        // Redirect back to the original page, without the 'add-to-cart' parameter.
        // We add the `get_bloginfo` part so it saves a redirect on https:// sites.
        return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));
    }

    add_filter( 'woocommerce_paypal_express_checkout_button_img_url', 'dtwc_change_paypal_logo', 20 );

    function dtwc_change_paypal_logo( $image, $size ) {
        $express_checkout_img_url = 'https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png';
        return $express_checkout_img_url;
    }

    add_filter( 'woocommerce_variable_price_html', 'dtwc_variation_price_format', 10, 2 );
 
    function dtwc_variation_price_format( $price, $product ) {
    
        $min_var_reg_price = $product->get_variation_regular_price( 'min', true );
        $min_var_sale_price = $product->get_variation_sale_price( 'min', true );
    
        if ( $min_var_sale_price < $min_var_reg_price ) {
            $price = sprintf( __( '<span class="starting-at">Starting at</span> <del>%1$s</del><ins>%2$s</ins>', 'woocommerce' ), wc_price( $min_var_reg_price ), wc_price( $min_var_sale_price ) );
        } else {
            $price = sprintf( __( '<span class="starting-at">Starting at</span> %1$s', 'woocommerce' ), wc_price( $min_var_reg_price ) );
        }

        return $price;
    }

    /**
     * Change number of related products output
     */ 
    function woo_related_products_limit() {
        global $product;
        $args['posts_per_page'] = 6;
        return $args;
    }
    
    add_filter( 'woocommerce_output_related_products_args', 'dtwc_related_products_args' );
    function dtwc_related_products_args( $args ) {
        $args['posts_per_page'] = 3; // 4 related products
        $args['columns'] = 3; // arranged in 2 columns
        return $args;
    }

    add_filter( 'woocommerce_breadcrumb_defaults', 'dtwc_woocommerce_breadcrumbs' );
    function dtwc_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => ' <i class="fas fa-sm fa-angle-right"></i> ',
                'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><i class="fas fa-fw fa-folder"></i> ',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'DutchtownSTL.org', 'breadcrumb', 'woocommerce' ),
            );
    }
?>