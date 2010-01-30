<?php /* Adding Time BG script to change out images based on fuzzy time function 
	Credits: 	timeBG.php
				originally (c) Aaron Robbins / www.aaronrobbins.com
	*************************************************************************/
	
/* Start initializing variables and set default values */
$cssName = "body";
$wptmppath = get_template_directory_uri();
$phase = "afternoon";
$showthis = "day";
$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url(" . $wptmppath . "/images/field-top-" . $showthis . ".jpg)}</style>";
$hourOffset = +2;  // NOTE: This is set to my local time (Host Server Time Zone - 3 = My Time Zone), change the value to reflect your local time

function timeBG($hourOffset,$cssName){
	$wptmppath = get_template_directory_uri();
    $hourOffset = ($hourOffset * 3600);
    $currentHour = date("G",time() + $hourOffset);
    if ($currentHour < 4) {
        $phase="midnight";
		$showthis = "night";
    } else if($currentHour < 7) {
        $phase="dawn";
		$showthis = "dawn";
    } else if($currentHour < 11) {
        $phase="morning";
		$showthis = "day";
    } else if ($currentHour < 16) {
        $phase="afternoon";
		$showthis = "day";
    } else if ($currentHour < 19) {
        $phase="dusk";
		$showthis = "dusk";
    } else if ($currentHour < 22) {
        $phase="evening";
		$showthis = "night";
    } else {
        $phase="midnight";
		$showthis = "night";
    }
    switch ($phase){
    	case "dawn":
			$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url(" . $wptmppath . "/images/field-top-" . $showthis . ".jpg)}</style>";
			echo $newbgcss ;
    		break;
    	case "morning":
    	case "afternoon":
			$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url(" . $wptmppath . "/images/field-top-" . $showthis . ".jpg)}</style>";
			echo $newbgcss ;
    		break;
    	case "dusk":
			$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url(" . $wptmppath . "/images/field-top-" . $showthis . ".jpg)}</style>";
			echo $newbgcss ;
    		break;
        case "evening":
        case "midnight":
			$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url('" . $wptmppath . "/images/field-top-" . $showthis . "-2.jpg')}</style>";
			echo $newbgcss ;
    		break;
    	default:
			$newbgcss = "<style type=\"text/css\" media=\"screen\">" . $cssName . "{background-image: url(" . $wptmppath . "/images/field-top-" . $showthis . ".jpg)}</style>";
			echo $newbgcss ;
    		break;
    }
}

/****************************************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php
if(function_exists('language_attributes')) { 
	language_attributes(); 
}else{
	echo "<h1>Oops:</h1><font color=\"red\">This theme only works with WordPress 2.1+. You seem to have an <b>outdated version</b> of WordPress. Please upgrade to <a href=\"http://www.wordpress.com\">a newer version</a> to use this theme.  (or, if anything, to get the latest security patches!)</font>";
//	exit();
}
?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_single() || is_home() || is_page() || is_archive()) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title('&minus;',true); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />

<!-- It would be a good idea to fill these in! -->
<meta name="keywords" content="" />

<meta name="DC.title" content="<?php if (is_single() || is_home() || is_page() || is_archive()) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title('&minus;',true); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<?php /* Adding Time BG script to change out images based on fuzzy time function */
		timeBG($hourOffset,$cssName);
	/***************************************************************************/ ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>

<?php /*?>IE opacity fix<?php */?>
<!--[if IE ]> <style type="text/css" media="screen">#header{filter: alpha(opacity=70);#pages{filter: alpha(opacity=80);}}</style> <![endif]-->
</head>
<body>
<div id="wrap">
<!--
<div id="header">
	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div id="searchtop"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /> </form> </div>
</div>
-->
<div id="pages">
<?php if (is_home()) { $thisishome = ' class="current_page_item"'; } ?>
	<ul>
	    <li<?php echo $thisishome; ?>>
	        <a href="<?php echo get_option('home'); ?>/">Home</a>
	    </li>
	    <?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
	</ul>
    <div id="searchtop"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /> </form> </div>
</div>
<div id="header">
Kingdom of Roi
</div>
<div style="clear:both;"></div>