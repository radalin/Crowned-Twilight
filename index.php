<?php get_header(); ?>
<div id="content">
    <div id="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
				<?php /*?>item<?php */?> 
				<div class="item entry" id="post-<?php the_ID(); ?>">
				          <div class="itemhead">
				            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				            <div class="chronodata">Posted <?php the_time('F jS, Y') ?> by <?php the_author() ?></div>
				          </div>
						  <div class="storycontent">
								<?php the_content('Read more &raquo;'); ?>
						  </div>
				          <div class="metadata">
							 <div class="category">  
                             Tagged and categorized as: <?php if (the_category(', '))  the_category(); ?> 
                             <?php if ( function_exists('wp_tag_cloud') ) : ?>
                             <?php the_tags(', ', ', ', ''); ?>
							 <?php endif; ?>
							 <?php edit_post_link('Edit', ' | ', ''); ?> 
							 | <?php comments_popup_link('No comments yet.', 'One comment.', '% Comments '); ?>
                             <?php if( pings_open() ) : ?>
                              | <a href="<?php trackback_url() ?>" rel="trackback" title="Uniform Resource Identifier">TrackBack 
                             	URI</a><?php endif; ?>                             
							 </div>
						  </div>
				 </div>
				 <?php /*?>end item<?php */?> 

<?php comments_template(); // Get wp-comments.php template ?>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
    <div style="height:1px; clear:both; width:100%;"></div>
	    
  </div>
<?php get_footer(); ?>