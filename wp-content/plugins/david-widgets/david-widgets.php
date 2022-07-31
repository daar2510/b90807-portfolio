<?php

/**
 * Plugin Name: David Widgets
 * Description: A collection of widgets for David's website.
 * Plugin URI:  https://github.com/daar2510/b90807-portfolio
 * Version:     1.0.0
 * Author:      David Atias
 * Author URI: https://github.com/daar2510
 * Text Domain: david-widgets
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit; // Exit if accessed directly.
 }

/**
 * Register widgets.
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_david_custom_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/rotating-image-widget.php' );

  $widgets_manager->register( new \Rotating_Image_Widget() ); // Register rotating image widget.

}
add_action( 'elementor/widgets/register', 'register_david_custom_widgets' );

function add_elementor_widget_categories( $elements_manager ) {
  
  $elements_manager->add_category(
    'david-widgets',
    [
      'title' => __( 'David Widgets', 'david-widgets' ),
      'icon' => 'fa fa-plug',
    ]
  );
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
add_action( 'elementor/frontend/after_register_styles', function() {
  wp_register_style( 'david-widget-style', plugins_url( 'assets/css/widget-rotating-image.css', __FILE__ ) );
} );
add_action( 'elementor/frontend/after_enqueue_styles', function() {
  wp_enqueue_style( 'david-widget-style' );
} );
