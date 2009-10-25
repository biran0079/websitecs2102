<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
$page_section = g_get_section();
$page_entry_title = g_get_entry_title();
?>
<div style="margin-left:100px">
<font size="2" face="Verdana">

<form action="advanced_search_result.php" method="post">

<table border="0" width="100%" cellpadding="10">
<tr>
<td>
<h3>Category</h3>
</td>
</tr>

<tr>
<td>
<?php
	$query='SELECT * FROM category';
	$result=db_query($query);
	while($row=db_fetch_array($result)){
		echo '<input type="checkbox" name="c_'.$row['cid'].'">'.$row['c_name'];
		echo '</td></tr><tr><td>';
	}
?>
<h3>Tag</h3>
</td></tr>

<tr>
<td>
<?php 
	$query='SELECT * FROM tag';
	$result=db_query($query);
	while($row=db_fetch_array($result)){
		echo '<input type="checkbox" name="t_'.$row['tid'].'">'.$row['t_name'];
		echo '</td></tr><tr><td>';
	}
?>
<h3>Visited more than</h3>
</td></tr>

<tr><td>
<input type="text" name="visit_time"> times
</td></tr>

<tr><td>
<h3>Posted before</h3>	
</td></tr>

<tr><td>
<input type="text" name="posted_before"> (yyyy-mm-dd)
</td></tr>

<tr><td>
<h3>Posted after</h3>	
</td></tr>

<tr><td>
<input type="text" name="posted_after"> (yyyy-mm-dd)
</td></tr>

<tr><td>
<input type="submit" value="Submit" />
</td></tr>

</table>

</form>

</font>
</div>
<?php
require_once('template/footer.php');
?>