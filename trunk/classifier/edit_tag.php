<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail


$login = check_logged_in();
if (!$login){
	echo "login in fail";
} else {
	$query="SELECT t_name FROM tag";
	$result=db_query($query);
	
	$rows = array();
	while ($row = db_fetch_array($result)){
		$rows[] = $row;
	}
	
	$num = count($rows);

	echo '<h2>Edit Tag</h2>';

	for ($i = 0; $i < $num; $i++){
		echo '	<div class = "edit_tag">
				<form name = "admin_input" action = "edit_tag_convert.php" method = "post">
					<div>'.$rows[$i]['t_name'].'</div>
					<input type = "hidden" name = "t_name_pre" value="'.$rows[$i]['t_id'].'"/>
				</form>
				</div>';
	}
		echo '<div class = "submit">
				<input type = "submit" value = "Edit" />
			  </div>';
	 
}
?>