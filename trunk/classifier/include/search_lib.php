<?php

/**
 * search main function
 * @return unknown_type
 */

function s_search(&$result){
	$key_words = $_POST['search_text'];
	
	
	
	$sql_search_category = " SELECT DISTINCT(pn.nid),pn.* FROM post_node AS pn ";
	$sql_search_category.= " INNER JOIN node_category AS nc ON (nc.nid = pn.nid)";
	$sql_search_category.= " INNER JOIN category AS c ON (c.cid = nc.cid)";
	$sql_search_category.= " WHERE ";
	// CUSTOMIZED WHERE CONDITION
	
	// dummy version
	$sql_search_category.= " LOWER(c_name) LIKE LOWER('%$key_words%')";
	
	
	$sql_search_tag.= " INNER JOIN node_tag AS nt ON (nt.nid = pn.nid)";
	$sql_search_tag.= " INNER JOIN tag AS t ON (t.tid = nt.tid)";
	
	$result = db_query($sql_search_category);
}

?>