<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail


$login = check_logged_in();
if (!$login){
	echo "login in fail";
} else {
	$query="select c_name from category";
	$result=db_query($query);
	$num = count($result);

	echo '<h2>Edit Category</h2>';

	for ($i = 0; $i < $num; $i++){
		echo '	<div class = "edit_category">
	<form name = "admin_input" action = "edit_category_convert.php" method = "post">
	<div>$result[$i]</div>
	<input type = "hidden" name = "c_name" value=".$result[$i]."/>
	<div class = "submit">
	<input type = "submit" value = "Edit" />
	</div>
	</form>
	</div>';
	}

}
?>