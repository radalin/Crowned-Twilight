<?php get_header(); ?>
<div id="content">
    <div id="main">
				<?php /*?>item<?php */?> 
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="item entry" id="post-<?php the_ID(); ?>">
				 <div class="itemhead">
				          <h3><?php the_title(); ?></h3>
				 </div>
				 <div class="storycontent">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
				 <?php /*?>end item<?php */?> 

		<?php endwhile; ?>
	<?php endif; ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
    <div style="height:1px; clear:both; width:100%;"></div>
	    
  </div>
<?php get_footer(); ?>