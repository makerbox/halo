<?php

/**
 * Utilities provides various useful methods.
 *
 * @package Geolocator
 */
class Geolocator_Utilities {

	/**
	 * Remove cookie which store location data.
	 *
	 * @return bool
	 */
	function removeCookie() {

		setcookie( 'geolocator_location', null, time() - 3600, COOKIEPATH, COOKIE_DOMAIN );

		return true;

	}

}

/* End of file class.utilities.php */