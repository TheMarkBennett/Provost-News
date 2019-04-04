<?php get_header(); the_post(); ?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> <?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-3 mt-sm-2 mb-3 pb-sm-4 ucf-news-entry">

	  		<?php provost_news_entry_header(); //post header ?>

	<div class="row justify-content-center">
		<div class="col-11 col-md-8">
			<?php provost_news_entry_content(); //post content?>
				<?php provost_news_entry_footer(); //post footer ?>
		</div>
	</div><!-- .container -->
</article><!-- #post-## -->
<?php provost_news_entry_recomended(); //recommended post ?>
<?php //get_template_part( 'template-parts/post/content', get_post_format() ); ?>
<?php get_footer(); ?>
