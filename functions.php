<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'leftsidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));


}

function widget_mytheme_search() {
?> 
        <?php /*?>
		
		********************* I do not want this to show on the sidebar *********************
		
        <h4>Search this site</h4>
        <div class="widget-move-over"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /></form></div>
		
		<?php */?>

<?php 
} 

function widget_mytheme_tags() {
?> 

        <h4>Popular Tags</h4>
        <div class="taggage">
        <?php wp_tag_cloud('smallest=8&largest=22'); ?>
        </div>

<?php 
} 

function widget_mytheme_pages() {
?> 

        <?php /*?>
		
		********************* Pages fills menu at the top, I do not want this to show on the sidebar *********************
		
		<h4>Pages</h4>
        <ul><li><a href="<?php echo get_option('home'); ?>/">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
		
		<?php */?>

<?php 
} 
if ( function_exists('register_sidebar_widget') ) 
	register_sidebar_widget(__('Search'), 'widget_mytheme_search');
	register_sidebar_widget(__('tag_cloud'), 'widget_mytheme_tags');
	register_sidebar_widget(__('Pages'), 'widget_mytheme_pages');

?>