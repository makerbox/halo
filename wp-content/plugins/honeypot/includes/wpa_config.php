<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$GLOBALS['wpa_field_name'] 				= get_option('wpa_field_name');
$GLOBALS['wpa_hidden_field'] 			= "<span class='wpa_hidden_field' style='display:none;height:0;width:0;'><input type='text' name='".$GLOBALS['wpa_field_name']."' value='1' /></span>";
$GLOBALS['wpa_error_message'] 			= get_option('wpa_error_message');
$GLOBALS['wpa_disable_test_widget'] 	= get_option('wpa_disable_test_widget');


