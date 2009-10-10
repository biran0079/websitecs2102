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
		if (isset($_POST['op']))
			return $_POST['op'];
		else	 	
			return DEFAULT_KEY_WORD;
}

function g_get_section_content(){
	$section = g_get_section();
	switch ($section){
		case DEFAULT_KEY_WORD:
				return g_formatter_list_add_recently();
		case SHOW_SEARCH_RESULT:
				
				return g_formatter_list_search_result();
		default: 
		//default action;
				return g_formatter_list_add_recently();				
	}
}


function g_get_entry_title(){
$section = g_get_section();
	switch ($section){
		case DEFAULT_KEY_WORD:
				return "Recently Added";
		case SHOW_SEARCH_RESULT:
				return "Search Result";
		default: 
		//default action;
				return "Recently Added";		
	}
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
 * @location: home page
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


function g_formatter_list_search_result(){
	
	s_search($result);
	
	//$query = " SELECT * FROM post_node ORDER BY date_add DESC LIMIT 10";

	//$result = db_query($query);
	
	$html_template = '<a href="#t_1#">#t_2#</a>';
	$formatter = new Formatter($html_template);
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_url']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}
/**
 * 
 * list all category
 * @location: home page
 */
function g_formatter_sidebar_list_category(){
	$query = " SELECT * FROM category";

	$result = db_query($query);
	
	$html_template = '<li><a href="#t_1#">#t_2#</a></li>';
	$formatter = new Formatter($html_template);
	
	$default_url = SITE_ROOT.'/home.php?op=show_category&cid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['cid']);
		$formatter->addContent('t_2',$row['c_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}


/**
 * 
 * list all category
 * @location: home page
 */
function g_formatter_sidebar_list_tags(){
	$query = " SELECT * FROM tag";

	$result = db_query($query);
	
	$html_template = '<li><a href="#t_1#">#t_2#</a></li>';
	$formatter = new Formatter($html_template);
	
	$default_url = SITE_ROOT.'/home.php?op=show_tag&tid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['tid']);
		$formatter->addContent('t_2',$row['t_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}

/**
 * 
 * list most popular page
 * @location: home page
 */
function g_formatter_sidebar_list_most_popular_node(){
	$query = " SELECT * FROM post_node ORDER BY visit_times DESC LIMIT 10";

	$result = db_query($query);
	
	$html_template = '<li><a href="#t_1#">#t_2#</a></li>';
	$formatter = new Formatter($html_template);
	
	//$default_url = SITE_ROOT.'/home.php?op=show_tag&tid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_url']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}

/**
 * 
 * list most popular page
 * @location: home page
 */
function g_formatter_sidebar_list_newly_added_node(){
	$query = " SELECT * FROM post_node ORDER BY date_add DESC LIMIT 10";

	$result = db_query($query);
	
	$html_template = '<li><a href="#t_1#">#t_2#</a></li>';
	$formatter = new Formatter($html_template);
	
	//$default_url = SITE_ROOT.'/home.php?op=show_tag&tid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_url']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}





?>