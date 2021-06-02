<?php

use GeoIp2\Database\Reader;

/**
 * Methods related to location of the user.
 *
 * @package Geolocator
 */
class Geolocator_Location {

	// Plugin related variables
	public $vars;

	// Location variable
	public $location;

	/**
	 * Constructor.
	 */
	public function __construct( $vars = array() ) {

		$this->vars = $vars;
		$this->location = $this->getLocation();

	}

	/**
	 * Get location of the user, save it in a cookie.
	 *
	 * @return array
	 */
	function getLocation() {

		if ( isset( $_COOKIE['geolocator_location'] ) ) {

			$location = unserialize( stripslashes( $_COOKIE['geolocator_location'] ) );

		} else {

			$options = get_option( 'geolocator_options' );
			$location = array();

			if ( isset( $_SERVER ) && array_key_exists( 'REMOTE_ADDR', $_SERVER ) ) {

				$ip = $_SERVER['REMOTE_ADDR'];

				if( $ip == '::1' && 
					array_key_exists( 'fallback_ip', $options ) &&
					! empty( $options['fallback_ip'] )
				)
					$ip = $options['fallback_ip'];

				// Get visitor location
				$location = array();

				try {

					// Get data from GeoLite2-Country database, more info: http://www.maxmind.com
					$reader = new Reader( $this->vars['path'] . 'source/GeoLite2-Country.mmdb');
					$record = $reader->country( $ip );

					if( ! empty( $record ) ) {

						if( isset( $record->country->isoCode ) && isset( $record->country->names['en'] ) ) {

							$location = array(
								'country' => $record->country->isoCode,
								'country_name' => $record->country->names['en'],
								'latitude' => false,
								'longitude' => false,
							);

							// IMPORTANT: latitude and longitude is depreciated, because GeoLite2-Country
							// database does not provide this data and we don't want to use GeoLite2-City
							// because of it's site -- it would be way too heavy for a small plugin.

						}

					}


				} catch (Exception $e) {

					// Do nothing, array is empty

				}

				// If location is retrieved, store it for later use
				if( ! empty( $location ) ) {

					setcookie( 'geolocator_location', serialize( $location ), time() + 3600, COOKIEPATH, COOKIE_DOMAIN );

				}
			}
		}

		return $location;

	}

	/**
	 * Get user country code.
	 *
	 * @return bool|string
	 */
	function getCountry() {

		$location = $this->location;

		if ( ! empty( $location ) && array_key_exists( 'country', $location ) ) {

			return $location['country'];

		}

		return false;

	}

	/**
	 * Get user country name.
	 *
	 * @return bool|string
	 */
	function getCountryName() {

		$location = $this->location;

		if ( ! empty( $location ) && array_key_exists( 'country_name', $location ) ) {

			return $location['country_name'];

		}

		return false;

	}

	/**
	 * Get user latitude.
	 *
	 * @return bool|string
	 */
	function getLatitude() {

		$location = $this->location;

		if ( ! empty( $location ) && array_key_exists( 'latitude', $location ) ) {

			return $location['latitude'];

		}

		return false;

	}

	/**
	 * Get user longitude.
	 *
	 * @return bool|string
	 */
	function getLongitude() {

		$location = $this->location;

		if ( ! empty( $location ) && array_key_exists( 'longitude', $location ) ) {

			return $location['longitude'];
			
		}

		return false;

	}

}

/* End of file class.location.php */