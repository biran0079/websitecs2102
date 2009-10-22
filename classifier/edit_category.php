<?php
require_once("template/header.php");
require_once("include/init.php");//where to go if login fail
?><!--  -->
<div id="panel">
	<?php 
		$login = check_logged_in();
			if (!$login){
				echo "login in fail";
			} else {
					$query="SELECT * from category";
					$result = db_query($query);
					$rows = array();
					while ($row = db_fetch_array($result)){
						$rows[] = $row;
					}	
					$num = count($rows);
	
					echo "<h2>Edit Category</h2>";
					for ($i = 0; $i < $num; $i++){
						echo '	<div class = "item_category">
									<form name = "admin_input" action = "edit_category_convert.php" method = "post">
										<label>'.$rows[$i]['c_name'].'</label>
										<input type = "hidden" name = "c_name" value="'.$rows[$i]['c_name'].'"/>
										<input type = "hidden" name = "cid" value="'.$rows[$i]['cid'].'"/>
										<input class="btn" type = "submit" value = "Edit" />
									</form>
								</div>';
					}	 
			}
?>
</div>
<?php
	require_once('template/footer.php');
?>