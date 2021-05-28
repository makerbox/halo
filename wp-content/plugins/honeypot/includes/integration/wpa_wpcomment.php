<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
// WP Comments
add_filter( 'preprocess_comment', 'wpa_wpcomment_extra_validation' );

function wpa_wpcomment_extra_validation( $commentdata ) {
    if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','wpcomment');
        wp_die( __( $GLOBALS['wpa_error_message'] ) );
    }
    return $commentdata;
}