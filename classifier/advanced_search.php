<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
$page_section = g_get_section();
$page_entry_title = g_get_entry_title();
?>
<div id ="adv-search">

<form action="advanced_search_result.php" method="post">

<h3>Category</h3>

<?php
	$query='SELECT * FROM category';
	$result=db_query($query);
	while($row=db_fetch_array($result)){
		echo '<input type="checkbox" name="c_'.$row['cid'].'">'.$row['c_name'];
		//echo '</td><td>';
	}
?>


<h3>Tag</h3>

<?php 
	$query='SELECT * FROM tag';
	$result=db_query($query);
	while($row=db_fetch_array($result)){
		echo '<input type="checkbox" name="t_'.$row['tid'].'">'.$row['t_name'];
		//echo '</td></tr><tr><td>';
	}
?>
<h3>Visited more than</h3>

<input type="text" name="visit_time"> times

<h3>Posted before</h3>	
<input type="text" name="posted_before"> (yyyy-mm-dd)

<h3>Posted after</h3>	

<input type="text" name="posted_after"> (yyyy-mm-dd)
<div style="margin-top:10px;">
<input type="submit" value="Submit" />
</div>
</form>
</div>
<?php
require_once('template/footer.php');
?>