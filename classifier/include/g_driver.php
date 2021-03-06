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


function g_get_person_post_last_update_entry(){
	$query = " SELECT UNIX_TIMESTAMP(date_add) AS t,user.username FROM post_node,user WHERE user.uid =post_node.uid  ORDER BY t DESC limit 1";
	$result = db_query($query);
	if ($row = db_fetch_array($result))
		return $row['username'];
}

function g_get_time_post_last_update(){
	$query = " SELECT UNIX_TIMESTAMP(date_add) AS t,DATE_FORMAT(date_add,'%e,%M,%Y') AS tf FROM post_node,user WHERE user.uid =post_node.uid  ORDER BY t DESC limit 1";
	$result = db_query($query);
	if ($row = db_fetch_array($result))
		return $row['tf'];
	
}

function g_get_section(){
	if (isset($_POST['op']))
	return $_POST['op'];

	if (isset($_GET['op']))
	return $_GET['op'];
		
	return DEFAULT_KEY_WORD;
}

function g_formatter_list_username_edit_delete(){
	
	$query="SELECT uid,username FROM `user` u;";
	$result=db_query($query);
	
	$html_template = '<li>#t_1#&nbsp<a href="#t_2#">edit</a>&nbsp<a href="#t_3#">delete</a></li>';
	$formatter = new Formatter($html_template);
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['username']);
		$edit_url=SITE_ROOT.'/edit_user_profile.php?uid='.$row['uid'];
		$formatter->addContent('t_2',$edit_url);
		$delete_url=SITE_ROOT.'/deactive_profile_confirmation.php?uid='.$row['uid'];
		$formatter->addContent('t_3',$delete_url);
		$formatter->flush();
	}
	return $formatter->finalize();
}


function g_get_section_content(){
	$section = g_get_section();
	switch ($section){
		case DEFAULT_KEY_WORD:
			return g_formatter_list_add_recently();
		case SHOW_SEARCH_RESULT:
			return g_formatter_list_search_result();
		case SHOW_AD_SEARCH_RESULT:
			return g_formatter_list_advance_search_result();	
		case SHOW_NODES_BY_CATEGORY:
			return g_formatter_list_nodes_by_category_id();
		case SHOW_TAG:
			return g_formatter_list_nodes_by_tag_id();
		case SHOW_ALL_NODES:
			return g_formatter_list_admin_nodes();	
		default:
			//default action;
			return g_formatter_list_add_recently();
	}
}


function g_get_category_name_by_cid($cid){

	$query = " SELECT * FROM category WHERE cid = %d LIMIT 1";
	$result = db_query($query,$cid);
	$row = db_fetch_array($result);
	return $row['c_name'];
}

function g_get_cid_by_nid($nid){
	
	$query = " SELECT * FROM node_category WHERE nid = %d";
	$result = db_query($query,$nid);
	$row = db_fetch_array($result);
	return $row['cid'];
}

function g_get_tag_name_by_tid($tid){

	$query = " SELECT * FROM tag WHERE tid = %d LIMIT 1";
	$result = db_query($query,$tid);
	$row = db_fetch_array($result);
	return $row['t_name'];
}

function g_get_entry_title(){
	$section = g_get_section();
	switch ($section){
		case DEFAULT_KEY_WORD:
			return "Recently Added";
		case SHOW_SEARCH_RESULT:
			return "Search Result";
		case SHOW_AD_SEARCH_RESULT:
			return "Search Result";	
		case SHOW_NODES_BY_CATEGORY:
			return "Category: ".g_get_category_name_by_cid($_GET['cid']);
		case SHOW_TAG:
			return "Tag: ".g_get_tag_name_by_tid($_GET['tid']);
		default:
			//default action;
			return "Recently Added";
	}
}

function g_add_tag_by_node($tags_string, $nid){

	$add_by = g_get_login_uid();
    $tags = explode(",", $tags_string);
	$num = count($tags);
	$query_tag = "INSERT IGNORE INTO tag (t_name, add_by) VALUES ('%s', '%d')";
	$query_node_tag = "INSERT IGNORE INTO node_tag (nid, tid) VALUES ('%d', '%d')";

	for ($i=0; $i < $num; $i++){
		db_query($query_tag, $tags[$i], $add_by);
		$query = "SELECT tid FROM tag WHERE t_name = '$tags[$i]'";
		$result = db_query($query);
		$tid = db_result($result);
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
	$query = " SELECT * FROM post_node AS p LEFT JOIN node_category AS nc 
			   ON(nc.nid = p.nid) LEFT JOIN category AS c ON (c.cid = nc.cid)
	           ORDER BY date_add DESC LIMIT 20";

	$result = db_query($query);	
	$html_template = '<div class="link">
						<a href="#t_1#" target="_blank" onclick="updateVisitTimes(#t_3#)"  style="font-size:#t_4#px">#t_2#</a>
						<label style="margin-left:10px;">#t_5#</label><label style="margin-left:10px;">#t_6#</label>
					 </div>';
	$formatter = new Formatter($html_template);

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['nid']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->addContent('t_3',$row['nid']);
		$formatter->addContent('t_5',$row['c_name']);
		if ($row['visit_times']>1)
			$formatter->addContent('t_6',$row['visit_times']." visits");
		else
			$formatter->addContent('t_6',$row['visit_times']." visit");	
		
		if ($row['visit_times'] < 5)
			$formatter->addContent('t_4',SMALL_TEXT_SIZE);
		else if ($row['visit_times'] < 10)
			$formatter->addContent('t_4',MEDIUM_TEXT_SIZE);
		else 
			$formatter->addContent('t_4',LARGE_TEXT_SIZE);
		$formatter->flush();
	}
	return $formatter->finalize();
}


function g_formatter_list_search_result(){

	$counter = 0;
	$html_template = '<div class="link">
						<a href="#t_1#" target="_blank" onclick="updateVisitTimes(#t_3#)"  style="font-size:#t_4#px">#t_2#</a>
						<label style="margin-left:10px;">#t_5#</label><label style="margin-left:10px;">#t_6#</label>
					 </div>';
	$formatter = new Formatter($html_template);	
	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	$nodes = s_search_master();
	foreach ($nodes as $node){
		$counter++;
		if ($counter > SEARCH_UPPER_LIMIT)
			break;
		$formatter->addContent('t_1',$default_url.$node['nid']);
		$formatter->addContent('t_2',$node['n_name']);
		$formatter->addContent('t_3',$node['nid']);
		$formatter->addContent('t_5',$node['c_name']);
		if ($row['visit_times']>1)
			$formatter->addContent('t_6',$node['visit_times']." visits");
		else
			$formatter->addContent('t_6',$node['visit_times']." visit");	
		
		
		if ($node['visit_times'] < 5)
			$formatter->addContent('t_4',SMALL_TEXT_SIZE);
		else if ($node['visit_times'] < 10)
			$formatter->addContent('t_4',MEDIUM_TEXT_SIZE);
		else 
			$formatter->addContent('t_4',LARGE_TEXT_SIZE);
		$formatter->flush();
	}
	return $formatter->finalize();
}



function g_formatter_list_advance_search_result(){

	$counter = 0;
	$html_template = '<div class="link">
						<a href="#t_1#" target="_blank" onclick="updateVisitTimes(#t_3#)"  style="font-size:#t_4#px">#t_2#</a>
						<label style="margin-left:10px;">#t_5#</label><label style="margin-left:10px;">#t_6#</label>
					 </div>';
	$formatter = new Formatter($html_template);	
	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	$nodes = s_advance_search();
	if (is_array($nodes))
		foreach ($nodes as $node){
					$counter++;
					if ($counter > SEARCH_UPPER_LIMIT)
					break;
					$formatter->addContent('t_1',$default_url.$node['nid']);
					$formatter->addContent('t_2',$node['n_name']);
					$formatter->addContent('t_3',$node['nid']);
					$formatter->addContent('t_5',$node['c_name']);
					if ($row['visit_times']>1)
						$formatter->addContent('t_6',$node['visit_times']." visits");
					else
						$formatter->addContent('t_6',$node['visit_times']." visit");	
					
					
					if ($node['visit_times'] < 5)
						$formatter->addContent('t_4',SMALL_TEXT_SIZE);
					else if ($node['visit_times'] < 10)
						$formatter->addContent('t_4',MEDIUM_TEXT_SIZE);
					else 
						$formatter->addContent('t_4',LARGE_TEXT_SIZE);
					$formatter->flush();
			}
		else
			return "No Result Matches Your Search Criteria";	
	return $formatter->finalize();
}

/**
 * list nodes by category id
 * @return unknown_type
 */

function g_formatter_list_nodes_by_category_id(){

	$cid = $_GET['cid'];

	$query = " SELECT pn.*,c.* FROM post_node AS pn";
	$query.= " INNER JOIN node_category AS nc ON (nc.nid = pn.nid)";
	$query.= " INNER JOIN category AS c ON (c.cid = nc.cid)";
	$query.= " WHERE c.cid = $cid ORDER BY date_add DESC";


	$result = db_query($query);

	$html_template = '<div class="link">
						<a href="#t_1#" target="_blank" onclick="updateVisitTimes(#t_3#)"  style="font-size:#t_4#px">#t_2#</a>
						<label style="margin-left:10px;">#t_5#</label><label style="margin-left:10px;">#t_6#</label>
					 </div>';
	$formatter = new Formatter($html_template);

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['nid']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->addContent('t_3',$row['nid']);
		$formatter->addContent('t_5',$row['c_name']);
		if ($row['visit_times']>1)
			$formatter->addContent('t_6',$row['visit_times']." visits");
		else
			$formatter->addContent('t_6',$row['visit_times']." visit");	
		
		if ($row['visit_times'] < 5)
			$formatter->addContent('t_4',SMALL_TEXT_SIZE);
		else if ($row['visit_times'] < 10)
			$formatter->addContent('t_4',MEDIUM_TEXT_SIZE);
		else 
			$formatter->addContent('t_4',LARGE_TEXT_SIZE);
		$formatter->flush();
	}
	return $formatter->finalize();
}


function g_formatter_list_nodes_by_tag_id(){

	$tid = $_GET['tid'];
	$query = "SELECT p.*,c.* FROM post_node AS p
	LEFT JOIN node_category AS nc ON(nc.nid = p.nid) 
	LEFT JOIN category AS c ON (c.cid = nc.cid)
	INNER JOIN node_tag AS nt ON (p.nid=nt.nid)
	WHERE nt.tid=%d";

	$result = db_query($query,$tid);

	$html_template = '<div class="link">
						<a href="#t_1#" target="_blank" onclick="updateVisitTimes(#t_3#)"  style="font-size:#t_4#px">#t_2#</a>
						<label style="margin-left:10px;">#t_5#</label><label style="margin-left:10px;">#t_6#</label>
					 </div>';
	$formatter = new Formatter($html_template);

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['nid']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->addContent('t_3',$row['nid']);
		$formatter->addContent('t_5',$row['c_name']);
		if ($row['visit_times']>1)
			$formatter->addContent('t_6',$row['visit_times']." visits");
		else
			$formatter->addContent('t_6',$row['visit_times']." visit");	
		
		if ($row['visit_times'] < 5)
			$formatter->addContent('t_4',SMALL_TEXT_SIZE);
		else if ($row['visit_times'] < 10)
			$formatter->addContent('t_4',MEDIUM_TEXT_SIZE);
		else 
			$formatter->addContent('t_4',LARGE_TEXT_SIZE);
		$formatter->flush();
	}
	return $formatter->finalize();
}

function g_formatter_list_admin_nodes($section){
	
	$db_result = db_query("SELECT COUNT(*) FROM post_node");
	$count_rows = db_result($db_result);
	
	$query = " SELECT pn.*,c.*,DATE_FORMAT(date_add,'%e-%m-%Y') AS date_add_format FROM post_node AS pn";
	$query.= " LEFT JOIN node_category AS nc ON (nc.nid = pn.nid)";
	$query.= " LEFT JOIN category AS c ON (c.cid = nc.cid)";
	$query.= " ORDER BY n_name LIMIT %d,%d";
	
	if ($section == 'col_1')
		$result = db_query($query,0,$count_rows / 2);
	else
		$result = db_query($query,$count_rows /2+1,$count_rows);
	$html_template = '<li><div>
	                      	    <a href="#t_2#" target="_blank" class="links">#t_1#</a>
	                      	   
	                      		<a href="node_edit.php?op=edit&nid=#t_3#" class="edit"> Edit</a>
	                      		<a href="midman/node_op.php?op=Delete&nid=#t_3#" class="delete" onclick="return confirm(\'Are you sure to delete this node?\')"> Delete </a>
	                      	    <span> #t_5# <span>	
	                      	    <span> #t_4# </span>
	                      </div>	
	                   </li>';
	$formatter = new Formatter($html_template);

	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_name']);
		$formatter->addContent('t_2',$row['n_url']);
		$formatter->addContent('t_3',$row['nid']);
		$formatter->addContent('t_4',$row['c_name']);
		$formatter->addContent('t_5',$row['date_add_format']);
		$formatter->flush();
	}
	return $formatter->finalize();
}

function g_formatter_list_all_categories($section){
	$db_result = db_query("SELECT COUNT(*) FROM category");
	$count_rows = db_result($db_result);
	$query = "SELECT * FROM category LIMIT %d,%d";
	
	if ($section == 'col_1')
		$result = db_query($query,0,$count_rows / 2);
	else
		$result = db_query($query,$count_rows /2+1,$count_rows);	
	
	$html_template = '<li>
							<label>#t_1#</label>
							<form name = "admin_input" action = "midman/checkin_category.php" method = "post">
							            <input type="hidden" name="op" value="delete">
										<input type = "hidden" name = "c_name" value="#t_1#"/>
										<input type = "hidden" name = "cid" value="#t_2#"/>
										<input class="btn" type = "submit" onclick="javascript:return confirm(\'are you sure you want to delete the link?\')" value = "Delete" />
							</form>
							<form name = "admin_input" action = "edit_category_convert.php" method = "post">
										<input type = "hidden" name = "c_name" value="#t_1#"/>
										<input type = "hidden" name = "cid" value="#t_2#"/>
										<input class="btn" type = "submit" value = "Edit" />
							</form>
							
					</li>';
	$formatter = new Formatter($html_template);
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['c_name']);
		$formatter->addContent('t_2',$row['cid']);
		$formatter->flush();
	}
	return $formatter->finalize();
}



function g_formatter_list_admin_categories(){
	$query="SELECT * FROM category";
	$result = db_query($query);
	$html_template = '<li>
						<a href="home.php?op=show_category&cid=#t_1#" target="_blank" class="links">#t_2#</a>
	                    <a href="edit_category.php?cid=#t_1#" class="edit"> Edit</a>
	                    <a href="midman/node_op.php?op=Delete&nid=#t_3#" class="delete"> Delete </a>
					</li>';
	$formatter = new Formatter($html_template);
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['cid']);
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

	$html_template = '<a href="#t_1#">#t_2#</a>';
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

	$html_template = '<li><a href="#t_1#" onclick="updateVisitTimes(#t_3#)">#t_2#</a></li>';
	$formatter = new Formatter($html_template);

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';

	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['nid']);
		$formatter->addContent('t_2',$row['n_name']);
		$formatter->addContent('t_3',$row['nid']);
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

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';

	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$default_url.$row['nid']);
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
function g_formatter_ui_list_all_category($nid=0){
	$query = "SELECT * FROM category";

	$result = db_query($query);

	$html_template = '<option value="#t_1#" #t_2#>#t_3#</option>';
	$formatter = new Formatter($html_template);


	$query = " SELECT cid FROM node_category AS nc,post_node AS pn WHERE pn.nid= $nid AND nc.nid= $nid";
	$select_result = db_query($query);
	if ($row  = db_fetch_array($select_result))
		$cid = $row['cid'];
	else
		$cid = 1;	
	
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['cid']);
		
		if ($cid == $row['cid'])
			$formatter->addContent('t_2','selected="selected"');
		else
			$formatter->addContent('t_2',' ');
			
		$formatter->addContent('t_3',$row['c_name']);
		$formatter->flush();
	}
	return $formatter->finalize();
}


function g_formatter_list_user_nodes(){
	$uid = g_get_login_uid();
	$query = "SELECT * FROM post_node WHERE uid=$uid ORDER BY date_update";
	$result = db_query($query);

	$html_template = '<li><div>
	                      	    <a href="#t_2#" target="_blank" class="links">#t_1#</a>
	                      		<a href="node_edit.php?op=edit&nid=#t_3#" class="edit"> Edit</a>
	                      		<a href="midman/node_op.php?op=Delete&nid=#t_3#" onclick="javascript:return confirm(\'are you sure you want to delete the link?\')" class="delete"> Delete </a> 
	                      </div>	
	                   </li>';
	$formatter = new Formatter($html_template);

	$default_url = SITE_ROOT.'/node_view.php?op=view&nid=';
	
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['n_name']);
		$formatter->addContent('t_2',$default_url.$row['nid']);
		$formatter->addContent('t_3',$row['nid']);
		$formatter->flush();
	}
	return $formatter->finalize();
}



function g_formatter_list_all_tags($section){
	$db_result = db_query("SELECT COUNT(*) FROM tag");
	$count_rows = db_result($db_result);
	$query = "SELECT * FROM tag ORDER BY tid LIMIT %d,%d";
	
	if ($section == 'col_1')
		$result = db_query($query,0,$count_rows / 2);
	else
		$result = db_query($query,$count_rows /2+1,$count_rows);
		
	$html_template = '<li>
							<label>#t_1#</label>
							<form name = "admin_input" action = "midman/checkin_tag.php" method = "post">
							            <input type="hidden" name="op" value="delete">
										<input type = "hidden" name = "t_name" value="#t_1#"/>
										<input type = "hidden" name = "tid" value="#t_2#"/>
										<input class="btn" type = "submit" onclick="javascript:return confirm(\'are you sure you want to delete the link?\')" value = "Delete" />
							</form>
							<form name = "admin_input" action = "edit_tag_convert.php" method = "post">
										<input type = "hidden" name = "t_name" value="#t_1#"/>
										<input type = "hidden" name = "tid" value="#t_2#"/>
										<input class="btn" type = "submit" value = "Edit" />
							</form>
							
					</li>';
	$formatter = new Formatter($html_template);
	while ($row = db_fetch_array($result)){
		$formatter->addContent('t_1',$row['t_name']);
		$formatter->addContent('t_2',$row['tid']);
		$formatter->flush();
	}
	return $formatter->finalize();
}


?>