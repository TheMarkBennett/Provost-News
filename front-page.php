<?php get_header(); the_post(); ?>

<div class="<?php echo $post->post_status; ?> post-list-item">




	<div class="front-page">

      <?php provost_news_featured_article(); ?>

      <div class="container py-4">
        <div class="row">
            <div class="col-12 col-md-8">
              <div class="content frontpage-news">
        <?php provost_news_featured_tax(); ?>
            </div>
          </div>

        <div class="col-12 col-md-4">
          <?php get_sidebar(); ?>
        </div>
    </div>
	 </div>
  </div>
<?php get_footer(); ?>
