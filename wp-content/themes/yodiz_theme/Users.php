<?php

class Users extends WPRest {

	// get user info
	// In: @id int - user id
	// Out: object json - user info
	function getUser($id) {
		return parent::wpRequest('wp/v2/users/' . $id);
	}
}
