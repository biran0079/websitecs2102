<?php

/**
 * return user name of the client
 * @return string username
 */
function d_get_user_name(){
	
	return $user_name;
}

/**
 * validate function
 * @param $user_name
 * @param $pwd
 * @return boolean, indicate whether the user is a valid user or not
 */

function validate_login_user($user_name,$pwd){
	$query_user_check = "SELECT * FROM user WHERE username = '%s' AND password='%s' LIMIT 1";
	$result = db_query($query_user_check,$user_name,$pwd);
	if ($row = db_fetch_array($result)){
		// set this user is a login user
		
		// clean up the session storage
		session_start();
		$uid = $row['uid'];
		
		// store information into $_SESSION
		session_name('Global'); 
		$_SESSION['user'] = $row;
		$_SESSION['uid'] = $uid;
		session_write_close(); 
		return true;
	}
	else
		return false;
}

/**
 * check login status
 * @return true if current viewer is login user
 */
function check_logged_in(){
	
	if (isset($_SESSION['uid']))
		return true;
	else
		return false;	
}


/**
 * check if last operation is an unsuccessful login attempt
 * @return bolean
 */
function login_fail(){
	if ($_GET['op']== 'login' && $_GET['result']=='fail')
		return true;
	else
		return false;		
}

/**
 * check the user by inputing uid
 * @param $uid
 * @return boolean 
 */

function check_in_user_by_uid($uid){
	$query_user_check = "SELECT * FROM user WHERE uid = '%d' LIMIT 1";
	$result = db_query($query_user_check,$uid);
	if ($row = db_fetch_array($result)){
		// set this user is a login user
		
		// clean up the session storage
		session_start();
		// store information into $_SESSION
		$_SESSION['user'] = $row;
		$_SESSION['uid'] = $uid;
		session_write_close(); 
		return true;
	}
	else
		return false;	
}
?>