<?php
// for every single file, include this file
require_once("./include/init.php");
require_once('template/header.php');
?>
<div class="register">
<div>
<h2>Registration</h2>
</div>
<div class="form">
<form name="user_input" action="update_user_profile.php" method="post">

<?php
$uid=g_get_login_uid();
$query="SELECT * from user where uid=$uid";
$result=db_query($query);
$arr=db_fetch_array($result);
$username=$arr["username"];
$email=$arr["email"];
echo '
		<div>Login Name*:</div>
		<input type="text" name="name" value='.$username.' disabled="disabled"/>
		<br/>
		<div>Password:</div>
		<input type="password" name="password"/>
		<div>Email:</div>
		<input type="text" name="email" value='.$email.' />
		<br/>
		<br/>
		<div class="submit">
			<input type="submit" value="Submit" />
		</div>
		';
?>
	</form>
</div>

</div>

<?php
require_once('template/footer.php');
?>

