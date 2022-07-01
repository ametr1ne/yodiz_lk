<?php


class BitrixBackend_Course extends BitrixBackend {

	function getAllCourses() {
		$queryData = http_build_query( (object) array(//			'entityTypeId' => $entityTypeId,
		) );

		return parent::bitrixRequest( 'crm.type.list', $queryData );
	}

	function getAllSubCourses( $entityTypeId ) {

		$queryData = http_build_query( (object) array(
			'entityTypeId' => $entityTypeId,
		) );

		return parent::bitrixRequest( 'crm.item.list', $queryData );
	}

	function getSubCourse( $entityTypeId, $id ) {

		$queryData = http_build_query( (object) array(
			'entityTypeId' => $entityTypeId,
			'id'           => $id
		) );

		return parent::bitrixRequest( 'crm.item.get', $queryData );
	}
}