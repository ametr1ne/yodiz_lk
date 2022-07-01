<?php

class BitrixBackend_Lesson extends BitrixBackend {

	function getAllLessons($courseID) {
		$queryData = http_build_query( (object) array(
			'FILTER' => (object) array (
				'CATALOG_ID' => 24,
				'SECTION_ID' => $courseID
			),
			'select' => ['*']
		) );

		return parent::bitrixRequest( 'crm.product.list', $queryData )->result;
	}

	function getLesson($id) {
		$queryData = http_build_query( (object) array(
			'ID' => $id
		));

		return parent::bitrixRequest('crm.product.get', $queryData)->result;
	}
}