<?php
/*
	Example uninstall.php file
	Contains examples provided in the tutorial:
	WordPress uninstall.php file - The Complete Guide
	@ https://digwp.com/2019/10/wordpress-uninstall-php/
*/

// exit if uninstall constant is not defined
if (!defined('WP_UNINSTALL_PLUGIN')) exit;



// delete database table
global $wpdb;
$table_name = $wpdb->prefix .'visitor_details';
$wpdb->query("DROP TABLE IF EXISTS {$table_name}");


// delete custom post type posts
$myplugin_cpt_args = array('post_type' => 'payment-methods', 'posts_per_page' => -1);
$myplugin_cpt_posts = get_posts($myplugin_cpt_args);
foreach ($myplugin_cpt_posts as $post) {
	wp_delete_post($post->ID, false);
}



// delete post meta
$myplugin_post_args = ( array(
	'fields'         => 'ids', // only return post ID´s
	'posts_per_page' => '-1',
	'post_type'      => array('post', 'page'),
));
$myplugin_posts = get_posts($myplugin_post_args);
foreach ($myplugin_posts as $post) {
	delete_post_meta($post, 'myplugin_post_meta');
	delete_post_meta($post, 'post_views_count');
}