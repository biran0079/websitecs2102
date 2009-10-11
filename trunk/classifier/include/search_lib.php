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
	$sql_search_category.= " WHERE 1=0 ";
	// CUSTOMIZED WHERE CONDITION
	$keys = explode(" ", $key_words);
	// dummy version
	foreach ($keys as $key)
		$sql_search_category.= " OR LOWER(c_name) LIKE LOWER('%$key%')";
	
		
		
	$sql_search_tag.= " INNER JOIN node_tag AS nt ON (nt.nid = pn.nid)";
	$sql_search_tag.= " INNER JOIN tag AS t ON (t.tid = nt.tid)";
	
	$result = db_query_debug($sql_search_category);
}

?>