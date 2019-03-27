<?php get_header(); the_post(); ?>
<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
<?php
/*
the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">'  . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . '</span></span>',
				) );
*/
 ?>
 <?php
if ( is_singular() ):
  ?>
 <section class="more-aricles mt-3 mb-4">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-11 col-md-8">
         <div class="row no-gutters">

         <div class="col-12 col-md-7">
             <h2 class="h5">Recomnended Articles</h2>
         </div>

       <div class="col-12 col-md-5">
          <h2 class="h5">Latest Articles</h2>

       </div>
     </div>

     </div>
   </div>
   </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
