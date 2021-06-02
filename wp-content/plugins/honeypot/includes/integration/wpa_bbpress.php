<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/* BB PRESS */
add_action(	'bbp_new_topic_pre_extras','wpa_bbp_extra_validation');
add_action(	'bbp_new_reply_pre_extras','wpa_bbp_extra_validation');

function wpa_bbp_extra_validation(){
	if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
		do_action('wpa_handle_spammers','bbpress');
		bbp_add_error( 'bbp_extra_email', __( $GLOBALS['wpa_error_message'], 'bbpress' ) );
	}
}