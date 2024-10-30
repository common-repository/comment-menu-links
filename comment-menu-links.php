<?php
/*
Plugin Name: Comment Menu Links
Plugin URI: http://pippinsplugins.com/
Description: Adds "Pending", "Approved", "Spam" and "Trash" sub menu items to the Dashboard Comments menu
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Version: 1.0
*/

function pippin_comment_menu_links() {
	add_comments_page(__('Pending Comments'), __('Pending'), 'moderate_comments', 'edit-comments.php?comment_status=moderated');
	add_comments_page(__('Approved Comments'), __('Approved'), 'moderate_comments', 'edit-comments.php?comment_status=approved');
	add_comments_page(__('Spammed Comments'), __('Spam'), 'moderate_comments', 'edit-comments.php?comment_status=spam');
	add_comments_page(__('Deleted Comments'), __('Trash'), 'moderate_comments', 'edit-comments.php?comment_status=trash');
}
add_action('admin_menu', 'pippin_comment_menu_links');

function pippin_comment_menu_js($hook) {
	if( $hook != 'edit-comments.php' || !isset( $_GET['comment_status'] ) )
		return;
		
	wp_enqueue_script('comment-menu-js', plugin_dir_url( __FILE__ ) . 'comment-menu-links.js', array('jquery'), '1.0' );		
	wp_localize_script('comment-menu-js', 'pcml_vars', array(
			'comment_status' => $_GET['comment_status']
		)
	);
}
add_action('admin_enqueue_scripts', 'pippin_comment_menu_js');
