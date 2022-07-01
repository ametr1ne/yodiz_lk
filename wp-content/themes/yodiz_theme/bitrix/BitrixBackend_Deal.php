<?php

class BitrixBackend_Deal extends BitrixBackend {

	function createNewDeal( $contactId ) {
		$url = 'https://kmarx.bitrix24.ru/rest/1/8t99o57baflxb9t1/crm.deal.add.json';

		$queryData = http_build_query( (object) array(
			'FIELDS' => [
				'TITLE'          => "Продажа бесплатного курса",
				"STAGE_ID"       => "NEW",
				"CONTACT_ID"     => $contactId,
				"ASSIGNED_BY_ID" => 1,
				"OPPORTUNITY"    => 0
			]
		) );

		$curl = curl_init();

		curl_setopt_array( $curl, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST           => 1,
			CURLOPT_HEADER         => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => $url,
			CURLOPT_POSTFIELDS     => $queryData
		) );

		$result = curl_exec( $curl );
		curl_close( $curl );

		return $result;
	}

	function getDeal($clientId, $subCourseId) {
		$queryData = http_build_query( (object) array(
			'FILTER' => (object) array(
				'CONTACT_ID' => $clientId,
				'UF_CRM_1656512284048' => $subCourseId
			),
			'select' => ['*', 'UF_*']
		) );

		return parent::bitrixRequest('crm.deal.list', $queryData)->result;
	}

	function updateDeal() {

	}
}