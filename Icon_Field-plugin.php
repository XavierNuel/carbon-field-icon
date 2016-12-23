<?php
/*
Plugin Name: Carbon Field: Icon
Description: Extends the base Carbon Fields with an Icon field. 
Version: 1.0.1
*/

/**
 * Set text domain
 * @see https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
 */
load_plugin_textdomain( 'carbon-field-icon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

/**
 * Add dir and url constants depending on loading method
 * @see https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
 */
if ( !defined( 'CARBON_FIELD_ICON_DIR' ) ) {
	define( 'CARBON_FIELD_ICON_DIR', plugin_dir_path( __FILE__ ) );
}
if ( !defined( 'CARBON_FIELD_ICON_URL' ) ) {
	define( 'CARBON_FIELD_ICON_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Hook field initialization
 */
add_action( 'after_setup_theme', 'crb_init_carbon_field_icon', 15 );
function crb_init_carbon_field_icon() {
	if ( class_exists( 'Carbon_Fields\\Field\\Field' ) ) {
		include_once dirname(__FILE__) . '/Icon_Field.php';
	}
}
