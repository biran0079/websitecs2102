<?php
require_once("template/header.php");
require_once("include/init.php");

$c_name_pre = $_POST['c_name'];
$cid = $_POST['cid'];

echo '
	<div class = "edit_category">
		<form name = "admin_input" action = "midman/checkin_category.php" method = "post">
		<div id="title"> Edit Category</div>
			<input type="hidden" value="edit" name="op">
		<div> 
			<label>Category Name</label>
			<input type="text" name="c_name" value="'.$c_name_pre.'"/>
			<input type="hidden" name = "cid" value="'.$cid.'"/>
		</div> 
		<div>
			<span> This operation cannot be undo, the change will affect the post nodes related!</span>
		</div>
	<div class = "submit">
	<input type = "submit" value = "Submit" />
	</div>
	</form>
	</div>';
?>