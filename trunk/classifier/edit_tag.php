<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail


$login = check_logged_in();
if (!$login){
	echo "login in fail";
} else {
	$query="select t_name from tag";
	$result=db_query($query);
	$num = count($result);

	echo '<h2>Edit Tag</h2>';

	for ($i = 0; $i < $num; $i++){
		echo '	<div class = "edit_tag">
	<form name = "admin_input" action = "edit_tag_convert.php" method = "post">
	<div>$result[$i]</div>
	<input type = "hidden" name = "t_name_pre" value=".$result[$i]."/>
	</form>
	</div>';}
		echo '<div class = "submit">
	<input type = "submit" value = "Edit" />
	</div>'
	 
}
?>