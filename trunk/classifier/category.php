<?php 
	require_once("template/header.php");
	require_once("include/init.php");
	$login = check_logged_in();   //where to go if login fail
	if (!$login){
   	echo "login in fail";
   } else {

<div class = "form">
<form name = "admin_input" action = "midman/add_category.php" method = "post">
<div>Category:</div>
<input type = "text" name = "c_name"/>
<br/>
<div class = "submit">
<input type = "submit" value = "Add" />
</div>
</form>
</div>
   }
?>