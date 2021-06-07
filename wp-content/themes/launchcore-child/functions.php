<?php
// load bundled scripts from webpack bundle minified
function load_child_bundled_js(){
	wp_enqueue_script('child_bundled_js', get_stylesheet_directory_uri() . '/dist/bundle.min.js', false, false ,false);
	$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
	wp_localize_script( 'child_bundled_js', 'wp_obj', $translation_array );
	wp_enqueue_style('child_bundled_css', get_stylesheet_directory_uri() . '/dist/bundle.css');
}
add_action( 'wp_enqueue_scripts', 'load_child_bundled_js', 20 );



add_theme_support( 'editor-styles' );    //enable custom styleet for WordPress editors
add_editor_style( get_stylesheet_directory_uri() . '/dist/bundle.css' );  //load the CSS file from your template directory

// allow shorthand for pulling together the template parts
function getPart($templateName, $partName){
	require_once('parts/'.$templateName.'/'.$partName.'.php');
}