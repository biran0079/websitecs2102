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
	$visit_times=$_POST['visit_time'];
	$posted_before=$_POST['posted_before'];
	$post_after=$_POST['posted_after'];
	

	
?>
<?php
require_once('template/footer.php');
?>