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
			$chosen_c[$c_num]=$row['c_name'];
			$c_num++;
		}
	}
	$query='SELECT * FROM tag';
	$result=db_query($query);
	while($row=db_fetch_array($result)){
		$idx='t_'.$row['tid'];
		if($_POST[$idx]=='on'){
			$chosen_t[$t_num]=$row['t_name'];
			$t_num++;
		}
	}
	if($_POST['visit_time']=="")
	   $visit_times="0";
	else
	   $visit_times=$_POST['visit_time'];
	   
	if($_POST['posted_before']=="")
		$posted_before="9999:12:31 00:00:00";
	else
		$posted_before=$_POST['posted_before'].' 00:00:00';
	
	if($_POST['posted_after']=="")
		$post_after="0000:01:01 00:00:00";
	else
		$post_after=$_POST['posted_after'].' 00:00:00';
	

	
?>
<?php
require_once('template/footer.php');
?>