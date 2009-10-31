<?php

/**
 * search function callback (category)
 * @return unknown_type
 */

function s_search_by_category(&$result){
	$key_words = $_POST['search_text'];
	$sql_search_category = " SELECT DISTINCT(pn.nid),pn.*,c.* FROM post_node AS pn ";
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
	$sql_search_tag.= " LEFT JOIN node_category AS nc ON(nc.nid = pn.nid) 
			   			LEFT JOIN category AS c ON (c.cid = nc.cid)";
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
	$sql_search_title = " SELECT pn.*,c.* FROM post_node AS pn LEFT JOIN node_category AS nc 
			   ON(nc.nid = pn.nid) LEFT JOIN category AS c ON (c.cid = nc.cid)";
	$sql_search_title.= " WHERE 1=0 ";
	// CUSTOMIZED WHERE CONDITION
	$keys = explode(" ", $key_words);
	// dummy version
	foreach ($keys as $key){
		$key = strtoupper($key);
		$sql_search_title.= " OR UPPER(pn.n_name) LIKE UPPER('%$key%')";
	}
	$result = db_query($sql_search_title);
	
}



function s_advance_search(){
	
$c_num=0;
$t_num=0;
$query='SELECT * FROM category';
$result=db_query($query);
while($row=db_fetch_array($result)){
	$idx='c_'.$row['cid'];
	if($_POST[$idx]=='on'){
		$chosen_c[$c_num]=$row['cid'];
		$c_num++;
	}
}
$query='SELECT * FROM tag';
$result=db_query($query);
while($row=db_fetch_array($result)){
	$idx='t_'.$row['tid'];
	if($_POST[$idx]=='on'){
		$chosen_t[$t_num]=$row['tid'];
		$t_num++;
	}
}

$visit_times=$_POST['visit_time'];
$posted_before_pre=$_POST['posted_before'];
$post_after_pre=$_POST['posted_after'];


if($_POST['visit_time']=="")
$visit_times="0";
else
$visit_times=$_POST['visit_time'];
if($_POST['posted_before']=="")
$posted_before="2011:12:31 00:00:00";
else
$posted_before=$_POST['posted_before'].' 00:00:00';
if($_POST['posted_after']=="")
$post_after="2000:01:01 00:00:00";
else
$post_after=$_POST['posted_after'].' 00:00:00';

//$posted_before = mktime($posted_before_pre);
//$post_after = mktime($post_after_pre);

$sql_search = " SELECT DISTINCT(pn.nid),pn.*,c.* FROM post_node AS pn ";
$sql_search.= " LEFT JOIN node_category AS nc ON (nc.nid = pn.nid)";
$sql_search.= " LEFT JOIN category AS c ON (c.cid = nc.cid)";
$sql_search.= " LEFT JOIN node_tag AS nt ON (nt.nid = pn.nid)";
$sql_search.= " LEFT JOIN tag AS t ON (t.tid = nt.tid)";
$sql_search.= " WHERE pn.visit_times >= $visit_times";
$sql_search.= " AND pn.date_add <= '".$posted_before."'";
$sql_search.= " AND pn.date_add <= '".$posted_before."' ORDER BY visit_times DESC";

if(!($c_num > 0 && $t_num > 0)){

	if($c_num > 0){
		$sql_search.= " AND (1=0";
		while($c_num > 1){
			$sql_search.= " OR nc.cid = '".$chosen_c[$c_num - 1]."'";
			$c_num--;
		}
		$sql_search.= " OR nc.cid = $chosen_c[0])";
	}

	if($t_num > 0){
		$sql_search.= " AND (1=0";
		while($t_num > 1){
			$sql_search.= " OR nt.tid = '".$chosen_t[$t_num - 1]."'";
			$t_num--;
		}
		$sql_search.= " OR nt.tid = '".$chosen_t[0]."')";
	}
}else{
	$sql_search.= " AND 1=0";
	}


$result = db_query($sql_search);
while($row = db_fetch_array($result)){
		$nodes_array[$row['nid']] = $row;
	}
	
	return $nodes_array;

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