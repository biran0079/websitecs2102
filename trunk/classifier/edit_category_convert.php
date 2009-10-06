<?php
require_once("template/header.php");
require_once("include/init.php");

$c_name_pre = $POST['c_name'];

echo '
	<div class = "form">
	<form name = "admin_input" action = "midman/checkin_category.php" method = "post">
	<div>Category</div>
	<input type="hidden" value="edit" name="op">
	<table>
	     <tr>
								<td>Old Category Name</td> 
								<td><input type="text" name="c_name_pre", value="'.$c_name_pre.'"></td>
								</tr>
		 <tr>
								<td>New Category Name</td>
								<td><input type="text" name="c_name"></td>
								</tr>
	</table> 
	<div class = "submit">
	<input type = "submit" value = "Submit" />
	</div>
	</form>
	</div>';
?>