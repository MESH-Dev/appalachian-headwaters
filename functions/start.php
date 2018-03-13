<?php

//Use this file for wp menus, sidebars, image sizes, loadup scripts.



//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {
    wp_enqueue_script( 'scrollr-js', get_template_directory_uri().'/js/scrollr.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'parallax-js', get_template_directory_uri().'/js/jquery.parallax-1.1.3.js', array('jquery'), '1.0.0', true );
    //wp_enqueue_script( 'loadmore', get_template_directory_uri().'/js/myloadmore.js', array('jquery'), '1.0.0', true );
   //https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css
	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true);

    wp_enqueue_style( 'fontawesome', '//use.fontawesome.com/releases/v5.0.6/css/all.css', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');



//Register WP Menus
register_nav_menus(
    array(
        'main_nav_1' => 'Heeader navigation, 1st half',
        'main_nav_2' => 'Heeader navigation, 2nd half',
        'social_nav' => 'Social menu used throughout',
        'site_map' => 'Site map for the entire site'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );









?>
