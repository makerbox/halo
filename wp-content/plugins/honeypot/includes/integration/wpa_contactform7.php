<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_filter( 'wpcf7_validate', 'wpa_contactform7_extra_validation', 10, 2 );

function wpa_contactform7_extra_validation($result, $tags){
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','contactform7');
		$result->invalidate('', $GLOBALS['wpa_error_message']);
	}
	return $result;
}