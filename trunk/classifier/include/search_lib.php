<?php

/**
 * search function callback (category)
 * @return unknown_type
 */

function s_search_by_category(&$result){
	$key_words = $_POST['search_text'];
	$sql_search_category = " SELECT DISTINCT(pn.nid),pn.* FROM post_node AS pn ";
	$sql_search_category.= " INNER JOIN node_category AS nc ON (nc.nid = pn.nid)";
	$sql_search_category.= " INNER JOIN category AS c ON (c.cid = nc.cid)";
	$sql_search_category.= " WHERE 1=0 ";
	// CUSTOMIZED WHERE CONDITION
	$keys = explode(" ", $key_words);
	// dummy version
	foreach ($keys as $key){
		$key = strtoupper($key);
		$sql_search_category.= " OR UPPER(c_name) LIKE UPPER('%$key%')";
	}
		
		
	$sql_search_tag.= " INNER JOIN node_tag AS nt ON (nt.nid = pn.nid)";
	$sql_search_tag.= " INNER JOIN tag AS t ON (t.tid = nt.tid)";
	
	$result = db_query($sql_search_category);
}


function s_search_by_tag(&$result){
	$key_words = $_POST['search_text'];
	$sql_search_tag = " SELECT DISTINCT(pn.nid),pn.* FROM post_node AS pn ";
	$sql_search_tag.= " INNER JOIN node_tag AS nt ON (nt.nid = pn.nid)";
	$sql_search_tag.= " INNER JOIN tag AS t ON (t.tid = nt.tid)";
	$sql_search_tag.= " WHERE 1=0 ";
	// CUSTOMIZED WHERE CONDITION
	$keys = explode(" ", $key_words);
	// dummy version
	foreach ($keys as $key){
		$key = strtoupper($key);
		$sql_search_tag.= " OR UPPER(t.t_name) LIKE UPPER('%$key%')";
	}
	$result = db_query($sql_search_tag);
}


function s_search_by_title(&$result){
	$key_words = $_POST['search_text'];
	$sql_search_title = " SELECT pn.* FROM post_node AS pn ";
	$sql_search_title.= " WHERE 1=0 ";
	// CUSTOMIZED WHERE CONDITION
	$keys = explode(" ", $key_words);
	// dummy version
	foreach ($keys as $key){
		$key = strtoupper($key);
		$sql_search_title.= " OR UPPER(pn.n_name) LIKE UPPER('%$key%')";
	}
	$result = mysql_query($sql_search_title);
	
}


function s_search_master(){
	s_search_by_category($result_category);
	s_search_by_tag($result_tag);
	s_search_by_title($result_title);
	
	//override is allowed
	$nodes_array = array();
	while($row = db_fetch_array($result_category)){
		$nodes_array[$row['nid']] = $row;
	}
	
	while($row = db_fetch_array($result_tag)){
		$nodes_array[$row['nid']] = $row;
	}
	
	while($row = db_fetch_array($result_title)){
		$nodes_array[$row['nid']] = $row;
	}
	return $nodes_array;
}

?>