<?php

add_action( 'admin_menu', 'geolocator_admin_create_menu', 2000 );

/**
 * Create submenu in Settings section.
 *
 * @return void
 */
function geolocator_admin_create_menu() {

	add_options_page(
		__( 'Geolocator Settings', 'geolocator' ),
		__( 'Geolocator', 'geolocator' ),
		'manage_options',
		'geolocator_options',
		'geolocator_admin_settings_page'
	);

}

/**
 * Get plugin settings page content.
 *
 * @return string
 */
function geolocator_admin_settings_page() {

	?>
	<div class="wrap">
		<h2><?php _e( 'Geolocator Settings', 'geolocator' ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'geolocator_options' ); ?>
			<?php do_settings_sections( 'geolocator' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php

}

add_action( 'admin_init', 'geolocator_admin_init', 2050 );

/**
 * Register and define settings.
 *
 * @return void
 */
function geolocator_admin_init() {

	register_setting(
		'geolocator_options',
		'geolocator_options',
		'geolocator_validate_options'
	);

	add_settings_section(
		'geolocator_main',
		false,
		false,
		'geolocator'
	);

	add_settings_field(
		'geolocator_fallback_ip',
		__( 'Fallback IP', 'geolocator' ),
		'geolocator_setting_fallback_ip',
		'geolocator',
		'geolocator_main'
	);

}

/**
 * Display and fill the form field.
 *
 * @return string
 */
function geolocator_setting_fallback_ip() {

	$options = get_option( 'geolocator_options' );
	?>
	<input type="text" name="geolocator_options[fallback_ip]" value="<?php if( array_key_exists( 'fallback_ip', $options ) ): ?><?php echo $options['fallback_ip']; ?><?php else: ?>66.155.40.250<?php endif; ?>" class="regular-text">
	<p class="description"><?php _e( 'Use this IP as a fallback for testing locally.', 'geolocator' ); ?></p>
	<?php

}

/**
 * Validate the options.
 *
 * @return array
 */
function geolocator_validate_options( $input ) {

	$valid = array();
	$valid['fallback_ip'] = trim( $input['fallback_ip'] );

	geolocator_remove_cookie();

	return $valid;

}

/* End of file settings.php */