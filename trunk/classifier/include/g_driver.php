<?php
/**
 * return username of current login user
 * @return user name
 */
function g_get_username(){
	session_start();
	return $_SESSION['user']['username'];
}

/**
 * return uid of current login user
 * @return uid
 */
function g_get_login_uid(){
	session_start();
	return $_SESSION['user']['uid'];
}

/**
 * check in user by inputing uid
 * @param $uid
 * @return boolean, successful or not
 */
function g_check_in_by_user($uid){
	return check_in_user_by_uid($uid);
};
?>