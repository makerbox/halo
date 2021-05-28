<?php

/**
 * Shortcodes class handles all custom shortcode functionality.
 *
 * @package Geolocator
 */
class Geolocator_Shortcodes {

	// Plugin related variables
	public $vars;

	// Location class injection
	public $location;

	/**
	 * Constructor.
	 */
	public function __construct( $vars = array(), $location = array() ) {

		$this->vars = $vars;
		$this->location = $location->location;

	}

	/**
	 * Init tasks.
	 *
	 * @return mixed
	 */
	function initTasks() {

		// Register shortcodes
		add_shortcode( 'geolocator', array( $this, 'geolocatorShortcode' ) );
		add_shortcode( 'geolocator_show', array( $this, 'geolocatorShowShortcode' ) );
		add_shortcode( 'geolocator_hide', array( $this, 'geolocatorHideShortcode' ) );

	}

	/**
	 * Geolocator shortcode.
	 *
	 * Main shortcode that simply returns country of the visitor.
	 *
	 * @param array $attributes
	 * @param string $content
	 *
	 * @return string
	 */
	function geolocatorShortcode( $attributes, $content = null ) {

		$location = $this->location;

		if( ! empty( $location ) ) 
			return $location['country_name'];

		return __( 'Unknown country', 'geolocator' );

	}

	/**
	 * Geolocator show shortcode.
	 *
	 * This shortcode allows to show some text for particular country.
	 *
	 * @param array $attributes
	 * @param string $content
	 *
	 * @return string
	 */
	function geolocatorShowShortcode( $attributes, $content = null ) {

		$location = $this->location;

		if( ! empty( $location ) && array_key_exists( 'for', $attributes ) ) {

			$for = trim( $attributes['for'] ); // Country 2-letter ISO code

			if( $location['country'] == $for )
				return $content;

		}

		return '';

	}

	/**
	 * Geolocator hide shortcode.
	 *
	 * This shortcode allows to hide some text for particular country.
	 *
	 * @param array $attributes
	 * @param string $content
	 *
	 * @return string
	 */
	function geolocatorHideShortcode( $attributes, $content = null ) {

		$location = $this->location;

		if( ! empty( $location ) && array_key_exists( 'for', $attributes ) ) {

			$for = trim( $attributes['for'] ); // Country 2-letter ISO code

			if( $location['country'] !== $for )
				return $content;

		}

		return '';

	}

}

/* End of file class.shortcodes.php */