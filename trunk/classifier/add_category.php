<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();   //where to go if login fail
if (!$login){
	echo "login in fail";
} else {
	echo '
	<div class = "form">
	<form name = "admin_input" action = "midman/checkin_category.php" method = "post">
	<div>Category:</div>
	<input type="hidden" name="op" value="add">
	<input type = "text" name = "c_name"/>
	<br/>
	<div class = "submit">
	<input type = "submit" value = "Add" />
	</div>
	</form>
	</div>';
}
?>