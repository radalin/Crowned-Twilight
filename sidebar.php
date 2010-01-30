	 <div id="menu">
     

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('leftsidebar') ) : ?>
			<h4>Categories</h4>
			<ul>
			<?php wp_list_categories('title_li='); ?>
			</ul>
			<br />
			<?php if ( function_exists('wp_tag_cloud') ) : ?>
			 <?php /*?>available in wp 2.3<?php */?> 
			<h4>Popular Tags</h4>
			<p>
			<?php wp_tag_cloud('smallest=8&largest=22&number=10'); ?>
			</p>
			<?php endif; ?>
			<h4>Archives</h4>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h4>Links</h4>
			<ul>
			<?php wp_list_bookmarks('title_li=0&categorize=0'); ?>
			</ul>
	<?php endif; ?>
	</div>
