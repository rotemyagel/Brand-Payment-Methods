<?php
/**
 * Plugin Name:     Brand Payment Methods
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Brand Payment Methods
 * Author:          rotem yagel
 * Author URI:      YOUR SITE HERE
 * Text Domain:     brand-payment-methods
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Brand_Payment_Methods
 */

// Your code starts here.

// To Protect plugin file from accessing directly
defined('ABSPATH') || die('You are not allowed to access this');


define( 'PLUGIN_ROOT_DIR', plugin_dir_path( __FILE__ ) );

$text_domain = 'brand-payment-methods';

include( PLUGIN_ROOT_DIR . '/post-types/payment-methods.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-metabox.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-tinymce.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-enqueue.php');




function payment_methods_func( ) {
    ob_start();
    include( PLUGIN_ROOT_DIR . '/templates/wp-payment.php');
    return ob_get_clean();
}
add_shortcode( 'payment_methods', 'payment_methods_func' );










