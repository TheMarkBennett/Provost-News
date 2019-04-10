<?php get_header(); ?>

<div class="container mt-4 mb-5 pb-sm-4">
<div class="d-flex">
  <div class="mr-auto">
    <h1 class="cat-title mb-3"><?php single_cat_title(); ?></h1>
  </div>

    <?php if ( is_active_sidebar( 'social_sidebar' ) ) : ?>
      <div class="provost_news_social mt-md-1">
        <?php dynamic_sidebar( 'social_sidebar' ); ?>
      </div>
    <?php endif; ?>
</div>
<div>
  <ul class="list-inline">
    <li class="list-inline-item px-2 py-1 mr-2" style="background-color: #eceeef;"> Category 1</li>
    <li class="list-inline-item px-2 py-1 mr-2" style="background-color: #eceeef;"> Category 2</li>
    <li class="list-inline-item px-2 py-1 mr-2" style="background-color: #eceeef;"> Category 3</li>
  </ul>

</div>

  <hr class="mb-3">
<div class="row">
  <div class="col-md-8">
    	<?php if ( have_posts() ): ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		<article class="<?php echo $post->post_status; ?> post-list-item mb-5 mt-5  d-md-flex flex-md-row">
          <?php if(has_post_thumbnail()): ?>
          <div class="cat-img col-md-4"><?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid', 'width' => 100, 'height' => 100  ) ); ?></div>
        <?php endif; ?>
          <div class="cat-body col-md">
          <h2 class="h4">
    				<a href="<?php the_permalink(); ?>" class="article-title text-secondary"><?php the_title(); ?></a>
    			</h2>
    			<div class="summary">
    				<?php the_excerpt(); ?>
    			</div>
          <div class="meta">
    				<span class="date text-muted text-uppercase letter-spacing-3 small" > Author<?php //the_time( 'F j, Y' ); ?> </span>
    			</div>
        </div>
    		</article>
    		<?php endwhile; ?>
    	<?php else: ?>
    		<p>No results found.</p>
    	<?php endif; ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
