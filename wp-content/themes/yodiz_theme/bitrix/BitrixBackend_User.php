<?php

class BitrixBackend_User extends BitrixBackend {

	function userRegistration( $email, $password, $refEmail ) {

		$password  = password_hash( $password, PASSWORD_DEFAULT );
		$queryData = http_build_query( array(
			'fields' => array(
//				'UF_CRM_1655728210660' => $refEmail, // TODO: Доделать рефералку
				'UF_CRM_1656324955' => $password,
				'EMAIL'             => array(
					"n0" => array(
						"VALUE"      => $email,
						"VALUE_TYPE" => "WORK",
					),
				),
			),
			'params' => array( "REGISTER_SONET_EVENT" => "Y" )
		) );

		return parent::bitrixRequest( 'crm.contact.add', $queryData );
	}

	function userRegistrationStep_2( $id, $firstName, $lastName, $birthDate, $phone, $sex ) {
		$queryData = http_build_query( array(
			'id'     => $id,
			'fields' => array(
				'NAME'              => $firstName,
				'LAST_NAME'         => $lastName,
				'BIRTHDATE'         => $birthDate,
				'UF_CRM_1656330909' => $sex,
				'PHONE'             => array(
					"n0" => array(
						"VALUE"      => $phone,
						"VALUE_TYPE" => "WORK",
					),
				),
			)
		) );

		return parent::bitrixRequest( 'crm.contact.update', $queryData );
	}

	function getUserInfo( $email ) {
		$queryData = http_build_query( (object) array(
			'FILTER' => (object) [
				'EMAIL' => $email
			],
			'SELECT' => ["UF_*"]
		) );

		return parent::bitrixRequest( 'crm.contact.list', $queryData )->result;
	}

	function getUserById( $id ) {
		$queryData = http_build_query( array( 'id' => $id ) );
		return parent::bitrixRequest( 'crm.contact.get', $queryData )->result;
	}

	function userExists( $email ) {
		$queryData = http_build_query( (object) array(
			'FILTER' => (object) [
				'EMAIL' => $email
			]
		) );

		if ( ! empty( parent::bitrixRequest( 'crm.contact.list', $queryData )->result ) ) {
			return true;
		} else {
			return false;
		}
	}

	function userPasswordVerify( $id, $pass ) {

		$user = $this->getUserById( $id );

		if ( password_verify( $pass, $user->UF_CRM_1656324955 ) ) {
			return true;
		} else {
			return false;
		}
	}

	function getAllUsers() {
		return parent::bitrixRequest( 'crm.contact.list', [] )->result;
	}

	function updateUserInfo( $id, $password ) {
		$password  = password_hash( $password, PASSWORD_DEFAULT );
		$queryData = http_build_query( array(
			'id'     => $id,
			'fields' => array(
				'UF_CRM_1656324955' => $password,
			),
			'params' => array( "REGISTER_SONET_EVENT" => "Y" )
		) );

		return parent::bitrixRequest( 'crm.contact.update', $queryData );
	}
}

?>