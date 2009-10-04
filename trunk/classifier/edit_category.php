<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail


$login = check_logged_in();
if (!$login){
	echo "login in fail";
} else {
	$query="select c_name from category";
	$result=db_query($query);

	echo '<h2>Edit Category</h2>';
    
	$row = db_fetch_array($result);
	while (!is_null($row)){
		echo '	<div class = "edit_category">
	<form name = "admin_input" action = "edit_category_convert.php" method = "post">
	<div>'.$row['c_name'].'</div>
	<input type = "hidden" name = "c_name" value="'.$row[c_name].'"/>
	<div class = "submit">
	<input type = "submit" value = "Edit" />
	</div>
	</form>
	</div>';
	$row = db_fetch_array($result);
	}

}
?>