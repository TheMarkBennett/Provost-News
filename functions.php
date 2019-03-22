<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );// add parent style

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'post-style', get_stylesheet_directory_uri() .'/includes/css/provost-news-post.css' );
}


add_filter( 'ucfwp_get_header_content_markup',  '__return_false' ); //remove the title from the header
