<?php

//define('PLUGIN_FOLDER', plugin_dir_path( __FILE__ )  );
define( 'PROVOST_NEWS_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );// add parent style

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'post-style', get_stylesheet_directory_uri() .'/includes/css/provost-news-post.css', array(),'1.0.0' );
}

require_once( PROVOST_NEWS_THEME_DIR . 'template-parts/header/news_header.php');


//Post
require_once( PROVOST_NEWS_THEME_DIR . 'template-parts/post/provost_news_entry_header.php'); //post header
require_once( PROVOST_NEWS_THEME_DIR . 'template-parts/post/provost_news_entry_content.php'); //post content
require_once( PROVOST_NEWS_THEME_DIR . 'template-parts/post/provost_news_entry_footer.php'); //post footer
require_once( PROVOST_NEWS_THEME_DIR . 'template-parts/post/provost_news_entry_recomended.php'); //the suggest articles to view


//custom image sizes
require_once( PROVOST_NEWS_THEME_DIR . 'includes/custom-image-sizes.php'); //custom image sizes

require_once( PROVOST_NEWS_THEME_DIR . 'includes/fontpage-querys.php'); //custom image sizes


//register sidebar

function provost_news_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Frontpage Sidebar' ),
            'id' => 'sidebar-1',
            'description' => __( 'Sidebar for the frontpage' ),
            'before_widget' => '<div class="widget-content mb-5">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title h6 py-2 px-3 bg-inverse text-uppercase font-weight-bold">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'provost_news_sidebar' );
