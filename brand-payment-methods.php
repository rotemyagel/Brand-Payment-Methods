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


// To Protect plugin file from accessing directly
defined('ABSPATH') || die('You are not allowed to access this');
define( 'PLUGIN_ROOT_DIR', plugin_dir_path( __FILE__ ) );

// includes
include( PLUGIN_ROOT_DIR . '/post-types/payment-methods.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-metabox.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-tinymce.php');
include( PLUGIN_ROOT_DIR . '/inc/wp-enqueue.php');
include( PLUGIN_ROOT_DIR . '/inc/post-view.php');




function payment_methods_func( ) {
    ob_start();
    include( PLUGIN_ROOT_DIR . '/templates/wp-payment.php');
    return ob_get_clean();
}
add_shortcode( 'payment_methods', 'payment_methods_func' );





function payment_methods_shortcode_posts()
{
    global $wpdb;
    return $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_content LIKE '%[payment_methods%' AND post_status = 'publish'", ARRAY_N );
}

$posts_shortcode = payment_methods_shortcode_posts();


foreach ($posts_shortcode as $key => $post_shortcode) {

    $shortcode_posts = [];
    $category = get_the_category($post_shortcode[0]);


    $shortcode_posts['id'] = $post_shortcode[0];
    $shortcode_posts['post_name'] = get_post_type($post_shortcode[0]);
    $category[0]->name && $shortcode_posts['category_name'] = $category[0]->name;
    
    $shortcode_posts_array[] = $shortcode_posts;

    

}










function collect_visitor_data() {
    
    global $wpdb;

$createSQL = "
CREATE TABLE `{$wpdb->prefix}visitor_details` (
    `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ip` VARCHAR(50) NOT NULL,
    `current_page` VARCHAR(50) NOT NULL,
 `hour` VARCHAR(50) NOT NULL,
 `date` VARCHAR(50) NOT NULL,
 `device` text NOT NULL,
    PRIMARY KEY (`ID`)
   ) ENGINE=InnoDB {$wpdb->get_charset_collate()}";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta($createSQL);

   
   
}
register_activation_hook(__FILE__,'collect_visitor_data');

    global $wpdb;

$time_zone = get_option('timezone_string');
date_default_timezone_set($time_zone);
$time = time();
$hour = date('h:i:s a', $time);
$date = date('d-m-y', $time);
$current_id = $_COOKIE['current_id'];

    $table = $wpdb->prefix.'visitor_details';
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $datetime = date("F j, Y, g:i a");
    $useragent = $_SERVER['HTTP_USER_AGENT'];   
    
    $data = array(
        "ip" => $ipaddress,
        "current_page" => $current_id,
        "hour" => $hour,
        "date" => $date,
        "device" => $useragent,
       
     );

     $format = array('%s','%d');

     $current_id = $_COOKIE['current_id'];
    

     foreach ($shortcode_posts_array as $key => $post) {
         # code...
         if($post['id'] === $current_id){
            $wpdb->insert($table,$data,$format);
            
         }
        

     }

     

    

    // SELECT `current_page`, COUNT(*) from `wp_visitor_details` 
    // GROUP BY `current_page`;


 


