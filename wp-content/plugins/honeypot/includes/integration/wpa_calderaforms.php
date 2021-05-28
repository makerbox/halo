<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function wpa_calderaforms_extra_validation(  ) { 
   	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','calderaforms');
		die($GLOBALS['wpa_error_message']);
	}
};
add_action( 'caldera_forms_pre_load_processors', 'wpa_calderaforms_extra_validation', 10, 0 );