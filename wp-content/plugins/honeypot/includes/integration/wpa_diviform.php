<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
foreach($_POST as $param => $value){
	if(strpos($param, 'et_pb_contactform_submit') === 0){
		$is_divi_form = 'true';
		$divi_form_additional = str_replace('et_pb_contactform_submit', '', $param);	
	}
}

if(!empty($is_divi_form) && $is_divi_form == 'true'){
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','divi_form');
		echo "<div id='et_pb_contact_form{$divi_form_additional}'><p>".$GLOBALS['wpa_error_message']."</p><div></div></div>";
		die();
	}	
}