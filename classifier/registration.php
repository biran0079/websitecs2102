<?php
// for every single file, include this file
require_once("./include/init.php");
require_once('template/header.php');
?>
<div class="register">
	<h2>Registration</h2>
	<form name="user_input" action="#" method="post">
		<div>User Name*:</div>
		<input type="text" name="name" />
		<br/>
		<div>Password:</div>
		<input type="text" name="pwd" />
		<div>First Name*:</div>
		<input type="text" name="name" />
		<br/>
		<div>Last Name*:</div>
		<input type="text" name="name" />
		<br/>
		<div>Email:</div>
		<input type="text" name="email" />
		<br/>
		<br/>
		<div class="submit">
			<input type="submit" value="Submit" />
		</div>
	</form> 

	
</div>

<?php 
require_once('template/footer.php');
?>

