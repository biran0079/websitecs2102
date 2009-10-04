<?php
require_once("template/header.php");
require_once("include/init.php");

$t_name_pre = $POST["t_name"];

	echo '
	<div class = "form">
	<form name = "admin_input" action = "midman/checkin_tag.php" method = "post">
	<div>Tag</div>
	<input type="hidden" value="edit" name="op">
	<input type="hidden" value=".$t_name_pre" name="t_name_pre">
	<input type = "text" name = "t_name"/>
	<br/>
	<div class = "submit">
	<input type = "submit" value = "Submit" />
	</div>
	</form>
	</div>';
?>