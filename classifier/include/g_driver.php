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

function g_add_tag_by_node($tags, $nid){
	
    $add_by = g_get_user_id();
	$num = count($tags);
	$query_tag = "INSERT IGNORE INTO tag (t_name, add_by) VALUES ('%s', '%d')";
	$query_node_tag = "INSERT IGNORE INTO node_tag (nid, tid) VALUES ('%d', '%d')";

	for ($i=0; $i < $num; $i++){
		db_query($query_tag, $tags[$i], $add_by);
		$query = "SELECT tid FROM tag WHERE t_name = '$tags[$i]'";
        $result = db_query($query);
        $tid = db_fetch_array($result);
        db_query($query_node_tag, $nid, $tid);
	}
	return;
}

function g_get_tag_by_node($nid){
	$tags = '';
	$query_node_tag = "SELECT tid FROM node_tag WHERE nid = '$nid'";
	$result = db_query($query_node_tag);
	
	$rows = array();
	while ($row = db_fetch_array($result)){
		$rows[] = $row;
	}
	
	$num = count($rows);
	
	for ($i = 0; $i < $num ; $i++){
		$query_tag = "SELECT t_name FROM tag WHERE tid = '$row[$i]['tid']'";
		$t_name_row = db_query($query_tag);
		$t_name = db_fetch_array($t_name_row);
		$tags .= $t_name;
	}
	
	return $tags;
	
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