<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_filter( 'wpforms_process_before', 'wpa_wpforms_extra_validation', 10, 2 );

function wpa_wpforms_extra_validation($entry, $form_data){
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','wpforms');
		wpforms()->process->errors[ $form_data['id'] ][ '0' ] = $GLOBALS['wpa_error_message'];
	}
}