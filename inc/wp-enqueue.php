<?php

function custom_scripts() {



    $wp_admin = is_admin();
    $wp_customizer = is_customize_preview();

    // jQuery
    if ( $wp_admin || $wp_customizer ) {
        // echo 'We are in the WP Admin or in the WP Customizer';
        return;
    }
    else {
        
        wp_deregister_script( 'jquery' ); 
        // Deregister WP jQuery
        wp_deregister_script( 'jquery-core' );
        // Deregister WP jQuery Migrate
        wp_deregister_script( 'jquery-migrate' );

        // Register jQuery in the head
        wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), null, false );
        wp_register_script( 'jquery', false, array( 'jquery-core' ), null, false );
        wp_enqueue_script( 'jquery' );
        // wp_enqueue_style( 'bootstrap-style' , 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' );
        wp_enqueue_style( 'font-awesome' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'footable-css' , 'https://cdn.rawgit.com/fooplugins/FooTable/V3/compiled/footable.standalone.min.css' );
        
        wp_enqueue_style( 'custom-style', plugins_url( '/assets/css/style.css', __FILE__ ) );
        // wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'footable-js', 'https://cdn.rawgit.com/fooplugins/FooTable/V3/compiled/footable.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'custom-js', plugins_url( '/assets/js/app.js', __FILE__ ), array( 'jquery' ), false, true );

    }





    }
    add_action( 'wp_enqueue_scripts', 'custom_scripts', 20 );



    

    function add_admin_scripts( $hook ) {

        global $post;
    
        if ( $hook == 'post.php' ) {
            if ( 'payment-methods' === $post->post_type ) {     
                // wp_enqueue_style( 'bulma-style' , 'https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css' );
            }
        }
    }
    add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );



    