<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
$page_section = g_get_section();
$page_entry_title = g_get_entry_title();
?>
<?php
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
<<<<<<< .mine
	$visit_times=$_POST['visit_time'];
	$posted_before_pre=$_POST['posted_before'];
	$post_after_pre=$_POST['posted_after'];
=======
	if($_POST['visit_time']=="")
	   $visit_times="0";
	else
	   $visit_times=$_POST['visit_time'];
	   
	if($_POST['posted_before']=="")
		$posted_before="9999:12:31 00:00:00";
	else
		$posted_before=$_POST['posted_before'].' 00:00:00';
>>>>>>> .r231
	
<<<<<<< .mine
	//$posted_before = mktime($posted_before_pre);
	//$post_after = mktime($post_after_pre);
	
	$posted_before_pre=$_POST['posted_before'];
	$post_after_pre=$_POST['posted_after'];
	
	$sql_search = " SELECT DISTINCT(pn.nid),pn.* FROM post_node AS pn ";
	$sql_search.= " INNER JOIN node_category AS nc ON (nc.nid = pn.nid)";
	$sql_search.= " INNER JOIN category AS c ON (c.cid = nc.cid)";
	$sql_search.= " INNER JOIN node_tag AS nt ON (nt.nid = pn.nid)";
	$sql_search.= " INNER JOIN tag AS t ON (t.tid = nt.tid)";
	$sql_search.= " WHERE (1=0 ";
	
	while($c_num > 1){
		$sql_search.= " OR c.cid = $chosen_c[$c_num - 1]";
		$c_num--;
	}
	$sql_search.= " c.cid = $chosen_c[0])";
	
	$sql_search.= " AND (1=0 OR t.tid = '".$chosen_t[$t_num - 1]."'";
	$t_num--;
	while($t_num > 0){
		$sql_search_tag.= " AND t.tid = '".$chosen_t[$t_num - 1]."'";
		$t_num--;
	}
	
	$sql_search.= " AND pn.visit_times > $visit_times )";
	
    $result = db_query_debug($sql_search);
	if($_POST['posted_after']=="")
		$post_after="1900-01-01 00:00:00";
	else
		$post_after=$_POST['posted_after'].' 00:00:00';
	


	
?>
<?php
require_once('template/footer.php');
?>