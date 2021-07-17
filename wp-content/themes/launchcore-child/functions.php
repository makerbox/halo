<?php
// load bundled scripts from webpack bundle minified
function load_child_bundled_js(){
	wp_enqueue_script('child_bundled_js', get_stylesheet_directory_uri() . '/dist/bundle.min.js', false, false ,true);
	$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
	wp_localize_script( 'child_bundled_js', 'wp_obj', $translation_array );
	wp_enqueue_style('child_bundled_css', get_stylesheet_directory_uri() . '/dist/bundle.css');
}
add_action( 'wp_enqueue_scripts', 'load_child_bundled_js', 20 );




function allow_styles_for_editor() {
	add_theme_support( 'editor-styles' );
    add_editor_style( '/dist/bundle.css' );
}
add_action( 'after_setup_theme', 'allow_styles_for_editor' );



// register footer menu
function footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'footer_menu' );
