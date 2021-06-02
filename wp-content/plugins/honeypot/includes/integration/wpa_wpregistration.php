<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_filter( 'registration_errors', 'wpa_wpregistration_extra_validation', 10, 3 );

function wpa_wpregistration_extra_validation( $errors, $sanitized_user_login, $user_email ) {
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','wpregistration');
		$errors->add( 'wpa_extra_email', __($GLOBALS['wpa_error_message']) );
	}
	return $errors;
}