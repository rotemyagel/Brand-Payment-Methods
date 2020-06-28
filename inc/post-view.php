<?php


function total_posts()
{
    global $wpdb;
    return $wpdb->get_results(" SELECT `current_page`, COUNT(*) FROM `{$wpdb->prefix}visitor_details` GROUP BY `current_page`", ARRAY_N );
}

$total_count = total_posts();





foreach ($total_count as $key => $count) {
    $count_posts = [];
    $count_posts['id'] = $count[0];
    $count_posts['total'] = $count[1];
    $count_posts['post_name'] = get_post_type($count[0]);
    
    $count_posts_array[] = $count_posts;
}

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID, $postCount) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count = $postCount;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);

add_filter('manage_page_posts_columns', 'posts_column_views');
add_action('manage_page_posts_custom_column', 'posts_custom_column_views',5,2);


function posts_column_views($defaults){
    $defaults['post_views'] = __('Payment Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}


if($count_posts_array){
    foreach ($count_posts_array as $key => $post) {
        # code...
        setPostViews($post['id'],$post['total']);
        
    }
}