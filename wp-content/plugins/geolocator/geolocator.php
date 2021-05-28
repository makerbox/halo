<?php
/*
Plugin Name: Geolocator
Plugin URI: https://wordpress.org/plugins/geolocator/
Description: Get website visitor's geolocation data (country, latitude, longitude) based on IP address. You can have different behavior for visitors in different countries.
Author: Nerijus Masikonis
Version: 1.1
Author URI: http://www.masikonis.lt/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define( 'GEOLOCATOR_VERSION', '1.1' );

register_activation_hook( __FILE__, 'geolocator_plugin_activation' );
register_deactivation_hook( __FILE__, 'geolocator_plugin_deactivation' );

/**
 * Activate the plugin.
 *
 * @return void
 */
function geolocator_plugin_activation() {

	// Create default settings on activate
	$geolocator_options = array(
		'fallback_ip' => '66.155.40.250',
	);

	update_option( 'geolocator_options', $geolocator_options );

}

/**
 * Deactivate the plugin.
 *
 * @return void
 */
function geolocator_plugin_deactivation() {

	// Delete option from options table
	delete_option( 'geolocator_options' );

	// Remove cookie with location data
	geolocator_remove_cookie();

}

if( ! class_exists( 'Geolocator' ) ) {

	// Load dependencies
	include_once( 'vendor/autoload.php' );
	include_once( 'classes/class.utilities.php' );
	include_once( 'classes/class.location.php' );
	include_once( 'classes/class.shortcodes.php' );
	include_once( 'classes/class.posts.php' );
	require_once( 'includes/widget.php' );

	/**
	 * Main class of Geolocator plugin.
	 *
	 * @package Geolocator
	 */
	class Geolocator {

		// Plugin related variables
		public $vars;

		// Utilities class injection
		public $utilities;

		// Location class injection
		public $location;

		// Shortcodes class injection
		public $shortcodes;

		// Posts class injection
		public $posts;

		/**
		 * Constructor.
		 *
		 * This method will construct all required actions, filters and functions.
		 *
		 * @return mixed
		 */
		function __construct() {

			// Set plugin variables
			$this->vars = array(
				'version'   => '1.1',
				'path'      => plugin_dir_path( __FILE__ ),
				'dir'       => plugin_dir_url( __FILE__ ),
			);

			// Init classes
			$this->utilities = new Geolocator_Utilities();
			$this->location = new Geolocator_Location( $this->vars );
			$this->shortcodes = new Geolocator_Shortcodes( $this->vars, $this->location );
			$this->posts = new Geolocator_Posts( $this->vars, $this->location );

			// Load translation files
			load_plugin_textdomain( 'geolocator', false, 'geolocator/languages' );

			// Actions
			add_action( 'init', array( $this, 'initTasks' ) );
			add_action( 'widgets_init', function() {
				register_widget( 'Geolocator_Widget' );
			});

		}

		/**
		 * Init tasks.
		 *
		 * @return mixed
		 */
		function initTasks() {

			// Custom admin settings
			if ( is_admin() ) {

				require_once( 'includes/settings.php' );

			}

			// Init tasks of classes
			$this->shortcodes->initTasks();
			$this->posts->initTasks();

		}

	}

	/**
	 * Main function that returns instance of plugin.
	 *
	 * @return object
	 */
	function geolocator() {

		global $geolocator;

		if( ! isset( $geolocator ) ) {

			$geolocator = new Geolocator();

		}

		return $geolocator;

	}

	/**
	 * Legacy methods (backwards compatibility).
	 *
	 * @return mixed
	 */
	function geolocator_remove_cookie() {
		global $geolocator;

		return $geolocator->utilities->removeCookie();
	}
	
	function geolocator_country() {
		global $geolocator;

		return $geolocator->location->getCountry();
	}

	function geolocator_country_name() {
		global $geolocator;

		return $geolocator->location->getCountryName();
	}

	function geolocator_latitude() {
		global $geolocator;

		return $geolocator->location->getLatitude();
	}

	function geolocator_longitude() {
		global $geolocator;

		return $geolocator->location->getLongitude();
	}

	// Initialize
	geolocator();

}

/* End of file geolocator.php */