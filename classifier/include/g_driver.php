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
function g_check_in_by_userid($uid){
	return check_in_user_by_uid($uid);
};

/**
 * check out loggin user
 */
function g_check_out(){
	session_start();
	session_destroy();
}
/**
 * return 
 * @return unknown_type
 */
function g_get_user_role(){
	return $_SESSION['user']['role'];
}

function g_get_section(){
	session_start();
	if (isset($_SESSION['keyword'])){
		return $_SESSION['keyword'];
	}	
	else
		return DEFAULT_KEY_WORD;
}


function g_get_entry_title(){
	return "Recently Added";
}

/**
 * list
 */
function g_formatter_list_add_recently(){
	$query = " SELECT * FROM post_node ORDER BY date_add DESC LIMIT 10";

	$result = db_query($query);
	
	$html_template = '<a href="#t_1#">#t_2#</a>';
	$formatter = new Formatter($html_template);
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_url']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}

?>