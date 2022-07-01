<?php

class BitrixBackend {

	private const URL = 'https://kmarx.bitrix24.ru/rest/1/7mxyu2ntnk2o5fnu/';

	protected function bitrixRequest( $method, $queryData ) {

		$requestUrl = self::URL . $method . '.json';

		$curl = curl_init();

		curl_setopt_array( $curl, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST           => 1,
			CURLOPT_HEADER         => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => $requestUrl,
			CURLOPT_POSTFIELDS     => $queryData
		) );

		$result = curl_exec( $curl );
		curl_close( $curl );

		return json_decode( $result );
	}
}

?>