<?php
require_once("template/header.php");
require_once("include/init.php");

$c_name_pre = $POST["c_name"];

	echo '
	<div class = "form">
	<form name = "admin_input" action = "midman/checkin_category.php" method = "post">
	<div>Category</div>
	<input type="hidden" value="edit" name="op">
	<input type="hidden" value=".$c_name_pre" name="c_name_pre">
	<input type = "text" name = "c_name"/>
	<br/>
	<div class = "submit">
	<input type = "submit" value = "Submit" />
	</div>
	</form>
	</div>';
?>