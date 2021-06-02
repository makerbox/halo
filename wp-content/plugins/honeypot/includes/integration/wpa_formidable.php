<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_filter( 'frm_validate_entry', 'wpa_formidable_extra_validation', 10, 2 );

function wpa_formidable_extra_validation($errors, $values){
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','formidable');
		$errors['my_error'] = $GLOBALS['wpa_error_message'];
	}
	return $errors;
}