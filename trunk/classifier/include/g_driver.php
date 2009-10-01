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

?>