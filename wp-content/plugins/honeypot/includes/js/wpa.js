jQuery(document).ready(function(){	
	wpa_add_honeypot_field();

	if (wpa_add_test == 'yes'){
		wpa_add_test_block();
	}	
});

function wpa_act_as_spam(){
	actiontype = jQuery('span.wpa-button').data('actiontype');
	if (actiontype == 'remove'){
		wpa_remove_honeypot_field();
		jQuery('span.wpa-button').data('actiontype','add');
		jQuery('span.wpa-button').html('Acting as Spam Bot');
	} else {
		wpa_add_honeypot_field();
		jQuery('span.wpa-button').data('actiontype','remove');
		jQuery('span.wpa-button').html('Act as Spam Bot');
	}
}

function wpa_add_honeypot_field(){
	jQuery('.bbp-topic-form form').append(wpa_hidden_field); // BBPRESS TOPIC
	jQuery('.bbp-reply-form form').append(wpa_hidden_field); // BBPRESS REPLY
	jQuery('form#commentform').append(wpa_hidden_field); // WP COMMENT
	jQuery('form#registerform').append(wpa_hidden_field); // WP REGISTRATION	
	jQuery('form.wpcf7-form').append(wpa_hidden_field); // CONTACT FORM 7
	jQuery('form.wpforms-form').append(wpa_hidden_field); // WPFFORMS
	jQuery('.gform_wrapper form').append(wpa_hidden_field); // GRAVITY FORMS
	jQuery('.frm_forms form').append(wpa_hidden_field); // Formidible forms
	jQuery('.caldera-grid form').append(wpa_hidden_field); // Caldera forms	
	jQuery('.wp-block-toolset-cred-form form').append(wpa_hidden_field); // Toolset Forms
	jQuery('form.et_pb_contact_form').append(wpa_hidden_field); // Divi Form	
	jQuery('form.elementor-form').append(wpa_hidden_field); // FOR Elementor
	jQuery('form.frm-fluent-form').append(wpa_hidden_field); // FOR Fluent Forms		
}

function wpa_add_test_block(){
	checkingTest = '<div class="wpa-test-msg"><strong>WP Armour ( Only visible to site administrators. Not visible to other users. )</strong><br />This form has a honeypot trap enabled. If you want to act as spam bot for testing purposes, please click the button below.<br/><span class="wpa-button" onclick="wpa_act_as_spam()" data-actiontype="remove">Act as Spam Bot</span></div>';
	jQuery('.wpa-test-msg').remove(); // Clear First
	jQuery('span.wpa_hidden_field').after(checkingTest);
}

function wpa_remove_honeypot_field(){
	jQuery('.wpa_hidden_field').remove();
}