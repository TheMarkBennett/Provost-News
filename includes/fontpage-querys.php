<?php

function provost_news_featured_article() {

  // WP_Query arguments
  $args = array(
  'post_type'              => array( 'post' ),
  'post_status'            => array( 'publish' ),
  'order'                  => 'DESC',
  'orderby'                => 'date',
  'posts_per_page'          => 3,
  'meta_query' => array(
		        array(
			'key'     => '_thumbnail_id',
			'value'   => '',
			'compare' => '!=',
		        )
         	      )


  );

$count = 1;
  // The Query
  $featured = new WP_Query( $args );

  // The Loop
  if ( $featured->have_posts() ) {?>
    <section class="featured-stories">
      <div class="container py-3">
        <div class="row no-gutters">

    <?php
  while ( $featured->have_posts() ) {
    $featured->the_post();
      if($count==1):?>
        <div class="col-12 col-md-7 p-1">
          <article class="left-featured post-<?php the_ID(); ?>">
            <?php
                $format = get_post_format() ? : 'standard';
                $link_url = get_the_permalink();

                 if( get_field('pub_article_url') ):
                  if ( $format == 'link' && !empty(get_field( "pub_article_url" ))  ):
                    $link_url = get_field( "pub_article_url" );
                  endif;
                endif;
            ?>
            <a href="<?php echo esc_url($link_url); ?>" class="d-flex w-100 p-4 media-background-container text-inverse text-decoration-none news-lg-bg">
                <?php the_post_thumbnail( 'large', array('class' => 'media-background object-fit-cover img-fluid hover-scale-up')); ?>
                <div class="align-self-end featured-text">
                  <div class="home-cat">
                    <span class="bg-inverse p-1 small text-uppercase font-weight-bold">
                      <?php $categories = get_the_category();
                      if ( ! empty( $categories ) ):
                            echo esc_html( $categories[0]->name );
                      endif;
                       ?>
                    </span>
                  </div>
                  <h2 class="text-shadow"><?php the_title(); ?></h2>
                </div>
            </a>
          </article>
        </div>
      <?php endif; ?>

      <?php if( $count > 1):?>

        <?php if( $count== 2):?>
            <div class="col-12 col-md-5 p-1">
        <?php endif;?>

        <?php
            $format = get_post_format() ? : 'standard';
            $link_url = get_the_permalink();
            if( get_field('pub_article_url') ):
             if ( $format == 'link' && !empty(get_field( "pub_article_url" ))  ):
               $link_url = get_field( "pub_article_url" );
             endif;
           endif;
        ?>

            <article class="right-featured post-<?php the_ID(); ?>">
              <a href="<?php echo esc_url($link_url); ?>" class="d-flex w-100 p-4 media-background-container text-inverse text-decoration-none news-md-bg mb-2">
                <?php the_post_thumbnail( 'large', array('class' => 'media-background object-fit-cover img-fluid hover-scale-up')); ?>
                <div class="align-self-end">
                  <div class="home-cat">
                    <span class="bg-inverse p-1 small text-uppercase font-weight-bold">
                      <?php $categories = get_the_category();
                      if ( ! empty( $categories ) ):
                            echo esc_html( $categories[0]->name );
                      endif;
                       ?>
                    </span>
                  </div>
                  <h3 class="text-shadow h5"><?php the_title(); ?></h3>
                </div>
              </a>
            </article>


        <?php if($count== 3):?>
              </div>
        <?php endif;?>
      <?php endif;?>


<?php
$count++;
} ?>

      </div>
    </div>
  </section>
  <?php
} else {
// no posts found
}

// Restore original Post Data
wp_reset_postdata();


}


function provost_news_featured_tax() {?>





          <?php
                  $categories = get_terms( array(
                        'taxonomy' => 'category',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'parent' => 0,
                        'hide_empty' => True,
                    ) );

                  foreach($categories as $category) {
                      wp_reset_query();
                      $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                          'tax_query' => array(
                              array(
                                  'taxonomy' => 'category',
                                  'field' => 'slug',
                                  'terms' => $category->slug,
                              ),
                          ),
                       );

                       $loop = new WP_Query($args);
                       if($loop->have_posts()) {?>

                         <section class="cat-<?php echo esc_html($category->slug); ?> py-4">

                          <?php $category_link = get_category_link($category->term_id);  ?>

                         <div class="d-flex justify-content-between bd-highlight mb-3 gold-divider news-cat">
                           <div class="home-topic">
                             <h2 class="h6 bg-primary header-tab text-uppercase"><?php echo esc_html($category->name); ?></h2>
                           </div>
                           <div class="home-more">
                             <div>

                               <ul class="list-inline list-unstyled mb-0">
                                 <li class="child-cat list-inline-item"><a href="<?php echo esc_url( $category_link ); ?>"> All</a> </li>
                                  <?php
                                    $parent = array('child_of' => $category->term_id);
                                    $child_cat = get_terms( 'category', array(
                                                      'orderby'    => 'count',
                                                      'hide_empty' => false,
                                                      'parent' => $category->term_id
                                                  ) );

                                    foreach($child_cat as $child) { ?>

                                      <li class="child-cat list-inline-item"><a href="<?php echo esc_url( get_category_link($child->term_id) ); ?>"><?php echo esc_html($child->name); ?> </a></li>
                                      <?php
                                    }
                                   ?>
                              </ul>

                               <!--<a href="<?php //echo esc_url( $category_link ); ?>"> View More >></a> -->
                             </div>
                           </div>
                         </div>
                         <?php
                          $count = 1;
                          while($loop->have_posts()) : $loop->the_post();
                              $article_link = esc_url(get_permalink());
                            if($count == 1):?>

                            <?php
                                $format = get_post_format() ? : 'standard';
                                $link_url = get_the_permalink();
                                if( get_field('pub_article_url') ):
                                 if ( $format == 'link' && !empty(get_field( "pub_article_url" ))  ):
                                   $link_url = get_field( "pub_article_url" );
                                 endif;
                               endif;
                            ?>

                            <div class="row">
                              <div class="col-12 col-md-6">
                                <a href="<?php echo esc_url($link_url); ?>"><?php the_post_thumbnail( 'medium-large', array('class' => 'img-fluid mb-3')); ?></a>
                                <h2 class="h4"> <a href="<?php echo esc_url($link_url); ?>"><?php the_title(); ?></a></h2>
                                <p><?php the_excerpt(); ?></p>
                              </div>
                              <div class="col-12 col-md-6">
                                <ul class="list-unstyled news-list">
                        <?php endif;
                        if($count > 1):?>
                        <?php
                            $format = get_post_format() ? : 'standard';
                            $link_url = get_the_permalink();
                            if( get_field('pub_article_url') ):
                             if ( $format == 'link' && !empty(get_field( "pub_article_url" ))  ):
                               $link_url = get_field( "pub_article_url" );
                             endif;
                           endif;
                        ?>
                              <li><a href="<?php echo esc_url($link_url); ?>"> <?php echo get_the_title(); ?></a></li>
                          <?php endif;
                          $count++;
                        endwhile; ?>
                              </ul>
                            </div>
                          </div>

                        <?php
                       }
                      ?> </section> <?php
                  }?>
          <?php }
















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
