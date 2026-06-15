<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function hello_elementor_register_books_widget( $widgets_manager ) {
	if ( ! class_exists( 'Books_Carousel_Widget' ) ) {
		require_once __DIR__ . '/widgets/class-books-carousel-widget.php';
	}
	$widgets_manager->register( new Books_Carousel_Widget() );
}

if ( did_action( 'elementor/widgets/register' ) ) {
	// If Elementor already loaded, register immediately
	add_action( 'elementor/widgets/register', 'hello_elementor_register_books_widget' );
	hello_elementor_register_books_widget( \Elementor\Plugin::instance()->widgets_manager );
} else {
	// Otherwise hook into the register action
	add_action( 'elementor/widgets/register', 'hello_elementor_register_books_widget' );
}
