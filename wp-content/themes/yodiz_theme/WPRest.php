<?php
/**
 * Template Name: REST
 */

class WPRest {

	private const USERNAME = 'rest';
	private const APPLICATION_PASSWORD = 'T2iu 6Uic mcPv 1WLe W6kk q9Fx';

	protected function wpRequest($endpoint) {

		$url = 'http://localhost/lk_wp/wp-json/' . $endpoint;

		$curl = curl_init();

		curl_setopt_array( $curl, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST           => 1,
			CURLOPT_HEADER         => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => $url,
			CURLOPT_USERPWD => self::USERNAME . ':' . self::APPLICATION_PASSWORD
		) );

		$result = curl_exec( $curl );
		curl_close( $curl );

		return json_decode($result);
	}
}



