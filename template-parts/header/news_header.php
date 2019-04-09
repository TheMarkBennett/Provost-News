<?php
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

function provost_news_the_custom_logo() { // display logo

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
	<?php do_action('website_before'); ?>
  <div class="container top-nav">
    <div class="d-flex justify-content-end">
      <ul class="mb-0 pt-2 small list-unstyled">
        <li><a href="">Back to Provost Website <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>

  <nav class="navbar navbar-toggleable-md navbar-news-custom news-nav pt-md-0 pb-md-2" role="navigation" aria-label="Site navigation">
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
