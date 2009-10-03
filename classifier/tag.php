<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();   //where to go if login fail

if (!$login){
	echo "login in fail";
}else {
    echo'
	<div class = "form">
	<form name = "user_input" action = "midman/add_tag.php" method = "post">
	<div>Tag:</div>
	<input type = "text" name = "t_names"/>
	<br/>
	<div class = "submit">
	<input type = "submit" value = "Add" />
	</div>
	</form>
	</div>'}
	?>