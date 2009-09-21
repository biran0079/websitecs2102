<?php
	if (isset($_GET['user'])){
		$sql = " SELECT * FROM user WHERE uid =".$_GET['user'];
		$con = mysql_connect("localhost","zhaocong","881213");
		mysql_select_db("cs2102", $con);
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$name = $row['name'];
		echo "<h1>Welcome! $name</h1>";
	}
	else
		echo "<h1>Welcome!</h1>";
	
?>

<form name="user_input" action="createnew.php" method="get">
Name:
<input type="text" name="name" />
<br />
Email:
<input type="text" name="email" />

<input type="submit" value="Submit" />
</form> 



