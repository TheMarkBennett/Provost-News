<?php


function provost_news_banner_article() {

}


function provost_news_featured_article() {

  // WP_Query arguments
 $args = array(
 	'post_type'              => array( 'post' ),
 	'post_status'            => array( 'publish' ),
 	'order'                  => 'DESC',
 	'orderby'                => 'date',
  'posts_per_page'          => 1,


 );

 // The Query
 $featured = new WP_Query( $args );

 // The Loop
 if ( $featured->have_posts() ) {
 	while ( $featured->have_posts() ) {
 		$featured->the_post();
?>
    <div class="row">
      <div class="featured-news col-12 ">
      <?php the_post_thumbnail( 'large', array('class' => 'featured-img img-fluid mb-2')); ?>
          <a href="<?php the_permalink(); ?>"><?php the_title('<h2 class="">', '</h2>'); ?></a>
          <p><?php the_excerpt(); ?></p>
        <a href="<?php echo get_the_permalink(); ?>" class="font-weight-bold">Read More ></a>
      </div>
    </div>



    <?php
 	}
 } else {
 	// no posts found
 }

 // Restore original Post Data
 wp_reset_postdata();


}



function provost_news_homepage_articles() {

  // WP_Query arguments
 $args = array(
 	'post_type'              => array( 'post' ),
 	'post_status'            => array( 'publish' ),
 	'order'                  => 'DESC',
 	'orderby'                => 'date',
  'posts_per_page'         => 2,
  'offset'                 => 1,

 );

 // The Query
 $featured = new WP_Query( $args );

 // The Loop
 if ( $featured->have_posts() ) {
   ?>
    <div class="two-articles row no-gutters mt-4 mb-3">
   <?php
 	while ( $featured->have_posts() ) {
 		$featured->the_post();
?>
      <div class="col-12 col-md-6 px-2">
        <?php the_post_thumbnail( 'large', array('class' => 'featured-img img-fluid mb-2')); ?>
        <a href="<?php the_permalink(); ?>"><?php the_title('<h2 class="">', '</h2>'); ?></a>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>"  > Read More ></a>
      </div>

    <?php
 	}
?></div>  <?php
 } else {
 	// no posts found
 }

 // Restore original Post Data
 wp_reset_postdata();


}
