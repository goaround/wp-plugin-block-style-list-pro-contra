<?php
Namespace ListProContra;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: Pro/Contra List Block Style
Plugin URI: https://go-around.de/blog/pro-contra-liste/(öffnet in neuem Tab)
Description: Block Style for Pro / Contra Lists
Version: 1.0.0
Author: Johannes Kinast
Author URI: https://go-around.de
Min WP Version: 5.0
*/

function register_assets() {
	wp_register_style(
		'list-pro-contra-style',
		plugins_url( 'list-style.css', __FILE__ ),
		[],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_assets' );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\register_assets' );

function enqueue_assets() {
	// Only load Style if a List Block is present
	if ( has_block( 'list' ) ) {
		wp_enqueue_style('list-pro-contra-style');
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

function enqueue_block_editor_assets_for_list() {
    wp_enqueue_script(
        'list-pro-contra-block-editor',
        plugins_url( 'block-editor.js', __FILE__ )
	);
	wp_enqueue_style('list-pro-contra-style');
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets_for_list' );