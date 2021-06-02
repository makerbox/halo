<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function wpa_fluent_form_extra_validation($insertData, $data, $form) { 
   if (!isset($data[ $GLOBALS['wpa_field_name']] )){
   		do_action('wpa_handle_spammers','fluent_forms');
		die($GLOBALS['wpa_error_message']);
	}
};
add_action( 'fluentform_before_insert_submission', 'wpa_fluent_form_extra_validation', 10, 3 );