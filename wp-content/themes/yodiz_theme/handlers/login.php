<?php

add_action( 'wp_ajax_registration', 'registration' );
add_action( 'wp_ajax_nopriv_registration', 'registration' );

function registration() {

	$postData   = formData( $_POST['data'] );
	$bitrixUser = new BitrixBackend_User();

	$email    = $postData['email'];
	$password = $postData['password'];

	if ( ! $bitrixUser->userExists( $email ) ) {

		$refID = '';

		if ( isset( $_COOKIE['refID'] ) ) {
			$refID = $_COOKIE['refID'];

//			$refID = get_user_meta( $userID, 'ref_id' )[0];
//
//			$refEmail = get_user_by( 'ID', $refID )->data->user_email;
		}

		$newUserId = $bitrixUser->userRegistration( $email, $password, $refID )->result;

		echo json_encode( array(
			'status' => 'redirect',
			'parameters' => [ 'userID' => $newUserId ],
			'url'    => '' . home_url() . '/registationsecondstep'
		) );
	} else {
		echo json_encode( array(
			'status'    => 'error',
			'textError' => 'Пользователь с таким email уже существует'
		) );
	}

	wp_die();
}

add_action( 'wp_ajax_registrationSecond', 'registrationSecond' );
add_action( 'wp_ajax_nopriv_registrationSecond', 'registrationSecond' );

function registrationSecond() {

	$postData = formData( $_POST['data'] );

	$userID = $_COOKIE['userID'];

	$firstName = $postData['name'];
	$lastName  = $postData['sec_name'];
	$phone     = $postData['phone'];
	$birthDate = $postData['date'];
	$sex       = $postData['sex'];

	if ( isset( $userID ) ) {

		$user = new BitrixBackend_User();

		$user->userRegistrationStep_2( $userID, $firstName, $lastName, $birthDate, $phone, $sex );

		echo json_encode( array( 'status' => 'redirect', 'url' => home_url() . '/courses' ) );

	} else {
		echo json_encode( array( 'status' => 'error', 'textError' => 'Произошла непредвиденная ошибка' ) );
	}

	wp_die();
}

add_action( 'wp_ajax_authorization', 'authorization' );
add_action( 'wp_ajax_nopriv_authorization', 'authorization' );

function authorization() {

	$postFields = formData( $_POST['data'] );
	$email      = $postFields['email'];

	$btxUser = new BitrixBackend_User();

	if ( $btxUser->userExists( $email ) ) {

		$password = $postFields['password'];
		$user = $btxUser->getUserInfo( $email );

		if ( password_verify($password, $user[0]->UF_CRM_1656324955 ) ) {

			$userID = $user[0]->ID;

			echo json_encode( array(
				'status'     => 'redirect',
				'parameters' => [ 'userID' => $userID ],
				'url'        => home_url() . '/courses'
			) );

		} else echo json_encode( array( 'status' => 'error', 'textError' => 'Пароли не совпадают' ) );
	} else echo json_encode( array( 'status' => 'error', 'textError' => 'Пользователь с таким email не найден' ) );

	wp_die();
}

add_action( 'wp_ajax_updateInfo', 'updatingInfo' );

function updatingInfo() {

	$postData = formData( $_POST['data'] );

	$userID = get_current_user_id();

	$first_name = $postData['name'];
	$last_name  = $postData['sec_name'];
	$phone      = $postData['phone'];
	$date       = $postData['date'];
	$sex        = $postData['sex'];

	if ( isset( $userID ) ) {
		update_user_meta( $userID, 'first_name', $first_name );
		update_user_meta( $userID, 'last_name', $last_name );
		update_user_meta( $userID, 'phone', $phone );
		update_user_meta( $userID, 'date', $date );
		update_user_meta( $userID, 'sex', $sex );

		echo json_encode( array( 'status' => 'redirect', 'url' => '' . home_url() . '/user_account' ) );
	} else {
		echo json_encode( array( 'status' => 'error', 'textError' => 'Произошла непредвиденная ошибка' ) );
	}

	wp_die();
}

add_action( 'wp_ajax_passRecovery', 'passwordRecovery' );

function passwordRecovery() {

	$postData = formData( $_POST['data'] );

	$userID = get_current_user_id();

	$userDB = get_user_by( 'ID', $userID );

	$password = $postData['password'];
	$hash     = $userDB->data->user_pass;

	if ( wp_check_password( $password, $hash ) ) {

		$newPassword = $postData['new_password'];
		wp_set_password( $newPassword, $userID );

		nocache_headers();
		wp_clear_auth_cookie();
		wp_set_auth_cookie( $userDB->data->ID, true );

		echo json_encode( array( 'status' => 'redirect', 'url' => '' . home_url() . '/user_account' ) );

	} else {
		echo json_encode( array( 'status' => 'error', 'textError' => 'Неправильно введен текущий пароль' ) );
	}

	wp_die();
}

add_action( 'wp_ajax_mailSender', 'mailSender' );
add_action( 'wp_ajax_nopriv_mailSender', 'mailSender' );

function mailSender() {

	$postData = formData( $_POST['data'] );

	if ( email_exists( $postData['email'] ) ) {
		$userID = get_user_by_email( $postData['email'] )->data->ID;
		wp_mail(
			$postData['email'],
			'Восстановление пароля от Yodiz School',
			'Ссылка на восстановление пароля: ' . home_url() . '/pass_changing?id=' . $userID,
			array(
				'From: yodizschool'
			)
		);
		echo json_encode( 'mail_sent' );
	} else {
		echo json_encode( array( 'status' => 'error', 'textError' => 'Пользователь с таким email не найден' ) );
	}

	wp_die();
}

add_action( 'wp_ajax_newPass', 'newPass' );
add_action( 'wp_ajax_nopriv_newPass', 'newPass' );

function newPass() {
	$postData = $_POST['data'][0];
	$userID   = $postData['userID'];

	if ( isset( $userID ) ) {
		$password = $postData['dataForm'][0]['value'];
		wp_set_password( $password, $userID );
		echo json_encode( $postData );
	} else {
		echo json_encode( array( 'status' => 'error', 'textError' => 'Не удалось найти пользователя' ) );
	}

	wp_die();
}


?>