<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );// add parent style

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'post-style', get_stylesheet_directory_uri() .'/includes/css/provost-news-post.css' );
}


add_filter( 'ucfwp_get_header_content_markup',  '__return_false' ); //remove the title from the header

add_filter( 'ucfwp_get_header_markup',  '__return_false' ); //remove the the whole nav


//add support for a logo
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
  	//'header-text' => array( 'site-title', 'site-description' ),
) );


function provost_news_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
     if(has_custom_logo()):
		     the_custom_logo();
    else:
      echo bloginfo( 'name' );
    endif;
  }else {
    echo bloginfo( 'name' );
  }
}


function ucfwp_get_header_markup(){?>

  <nav class="navbar navbar-toggleable-md navbar-news-custom news-nav" role="navigation" aria-label="Site navigation">
  	<div class="container d-flex flex-row flex-nowrap justify-content-between">
  		<span class="mb-0">
  			<?php provost_news_the_custom_logo(); ?>
  		</span>
  		<button class="navbar-toggler ml-auto align-self-start collapsed" type="button" data-toggle="collapse" data-target="#header-menu" aria-controls="header-menu" aria-expanded="false" aria-label="Toggle navigation">
  			<span class="navbar-toggler-text">Navigation</span>
  			<span class="navbar-toggler-icon"></span>
  		</button>

  		<?php
  		wp_nav_menu( array(
  			'container'       => 'div',
  			'container_class' => 'collapse navbar-collapse align-self-lg-stretch',
  			'container_id'    => 'header-menu',
  			'depth'           => 2,
  			'fallback_cb'     => 'bs4Navwalker::fallback',
  			'menu_class'      => 'nav navbar-nav ml-md-auto',
  			'theme_location'  => 'header-menu',
  			'walker'          => new bs4Navwalker()
  		) );
  		?>
  	</div>
  </nav>

<?php
}
