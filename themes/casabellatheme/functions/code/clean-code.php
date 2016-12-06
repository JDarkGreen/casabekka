<?php 
/*
 * File   : clean code
 * Acción : Permite eliminar codigo innecesario de la web 
 */

/*
 * Header cleanup
 */
function theme_cleanup() {
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}

add_action('after_setup_theme', 'theme_cleanup', 16);

/*
 * Removes WordPress version from scripts
 */
function theme_remove_version_code($src) {
	if (strpos($src, 'ver=') !== false) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'theme_remove_version_code', 99);
add_filter('script_loader_src', 'theme_remove_version_code', 99);


/**
 * Removes WordPress version from RSS
 */
function theme_rss_version() {
	return '';
}
add_filter('the_generator', 'theme_rss_version');

/**
 * Removes injected CSS from recent comments widget
 */
function theme_remove_wp_widget_recent_comments_style() {
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
}
add_filter('wp_head', 'theme_remove_wp_widget_recent_comments_style', 1);


/**
 * Removes injected CSS from gallery
 */
function theme_gallery_style($css) {
	return preg_replace("!!s", '', $css);
}
add_filter('gallery_style', 'theme_gallery_style');