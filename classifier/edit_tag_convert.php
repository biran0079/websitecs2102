<?php
require_once("template/header.php");
require_once("include/init.php");

$tid = $_POST["tid"];
$t_name_pre = $_POST["t_name"];
	echo '
	<div class = "form">
	<form name = "admin_input" action = "midman/checkin_tag.php" method = "post">
	<div>Tag</div>
	<input type="hidden" name="op" value="edit"/>
	<input type="hidden" name="tid" value="'.$tid.'">
	<input type = "text" name = "t_name" value = "'.$t_name_pre.'"/>
	<div>
		<span> This operation cannot be undo, the change will affect the post nodes related!</span>
	</div>
	<div class = "submit">
	<input type = "submit" value = "Submit" />
	</div>
	</form>
	</div>';
?>