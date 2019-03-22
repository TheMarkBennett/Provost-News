<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> <?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-3 mt-sm-2 mb-3 pb-sm-4 ucf-news-entry">
    <div class="row justify-content-center ">
      <div class="col-12 col-md-10">
    		<header class="entry-header">
          <div class="meta post-category mt-4 d-flex small mb-2 "><?php if(function_exists("seopress_display_breadcrumbs")) { seopress_display_breadcrumbs(); } ?></div>
        <!--  <div class="meta post-category my-5 "><span class="category-terms bg-primary py-1 px-2"><?php the_category( ',' ); ?></span></div> -->
					<div class="mb-4">
						<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
						<?php if ( ! has_excerpt() ): ?>
	          <div class="post-excerpt lead mb-1"> <? //the_excerpt(); ?></div>
						<meta itemprop='description' content='<? the_excerpt(); ?>'/>
						<?php endif; ?>
				</div>
					<div class="post-divider1"></div>

    			<?php if ( has_post_thumbnail() ): ?>
    				<div class="post-thumb-img-content post-thumb">
              <figure class="figure">
    						<?php the_post_thumbnail( 'large', array( 'class' => 'figure-img img-fluid mx-auto d-block', 'itemprop' => "image" ) ); ?>
                <?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                    if(!empty($caption)):
                 ?>
                <figcaption class="figure-caption mx-4" itemprop='caption'> <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?> </figcaption>
              <?php endif; ?>
              </figure>
    				</div><!-- .post-thumbnail -->
    			<?php endif; ?>
    		</header><!-- .entry-header -->
  </div>
  </div> <!-- close row -->

<div class="row justify-content-center">
	<div class="col-11 col-md-8">
		<div class="ucf-publish my-4">
			<span class="post-author" itemscope itemprop="author" itemtype="http://schema.org/Person"><?php echo esc_html('By:' ); ?> <span itemprop="name"><?php the_author();?></span> &#183; </span>
			<span class="publish-date text-default-aw" itemprop="datePublished" content="<?php echo get_the_date("Y-d-m"); ?>"> <?php echo get_the_date("M d, Y"); ?> </span>
	</div>
		<div class="entry-content" itemprop="articleBody">
    		      <?php the_content(); ?>
    </div>

  <footer class="entry-footer mt-5 pb2">
            <div class="post-tags"><?php the_tags( '<strong>Tags:</strong> ', ', ', '<br />' ); ?></div>

						<div class="author-info row mt-3">

						<!--	<div class="col">
								<div class="author" itemprop="name" ><?php //echo esc_html('By:' ); ?> <?php //the_author();?></div>
								<div>Office of the Provost and Academic Affairs</div>

							</div> -->

						</div>

    </div>
  </footer>
</div><!-- .container -->
</article><!-- #post-## -->
