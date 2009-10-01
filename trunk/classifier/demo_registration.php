<?php
// for every single file, include this file
require_once("./include/init.php");
require_once('template/header.php');
if (isset($_GET['user'])){
		$sql = " SELECT * FROM user WHERE uid = %d";		
		$result = db_query($sql,$_GET['user']);
		$row = db_fetch_array($result);
		$name = $row['username'];
		echo "<h1>Welcome! $name</h1>";
	}
	else
		echo "<h1>Welcome!</h1>";
	
?>
<div class="register">
	<form name="user_input" action="demo_createnew.php" method="get">
		<div>Name:</div>
		<input type="text" name="name" />
		<br/>
		<div>Email:</div>
		<input type="text" name="email" />
		<br/>
		<div>Password:</div>
		<input type="text" name="pwd" />
		<input type="submit" value="Submit" />
	</form> 

	<form name="user_input" action="test_db.php" method="get">
		<input type="submit" value="List all users" />
	</form>
</div>




<?php 
require_once('template/footer.php');
?>

