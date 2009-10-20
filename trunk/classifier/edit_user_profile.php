<?php
// for every single file, include this file
require_once("./include/init.php");
require_once('template/header.php');
?>


<?php
$login_uid=g_get_login_uid();
$role=g_get_user_role();
if (isset($_GET['uid']))
 $uid = $_GET['uid'];
else
 // edit your own profile
 $uid = $login_uid;	 
$query="SELECT * from user where uid=$uid";

$result=db_query($query);

$arr=db_fetch_array($result);

$username=$arr["username"];
$password=$arr['password'];
$email=$arr["email"];

if (!$arr || ($role==2 && $login_uid!=$uid)){
	$html= '
				<div class="authwarning">
					<div>
						<h1>Sorry</h1>
					</div>
					<div>
						<h2>you are not allowed to edit this user\'s profile, you either have not loggin or you are not authorised to see this page.</h3>
					</div>
					</div>
			';
}else{
	$html= '
	<div class="register">
		<div>
			<h2>Profile</h2>
		</div>
	<div class="form">
		<form name="user_input" action="update_user_profile.php" method="post">
				<div>Login Name*:</div>
					<input type="text" name="name" value='.$username.' disabled="disabled" />
				<br/>
				<div>Password:</div>
					<input type="password" name="password" value='.$password.' />
				<br/>
				<div>Repeat Password:</div>
					<input type="password" name="repeat_password" value='.$password.' />
				<br/>
				<div>Email:</div>
					<input type="text" name="email" value='.$email.' />
				<br/>
				<br/>
				<div class="submit">
					<input type="submit" value="Submit" />
				</div>
		</form>
	</div>
</div>
		';
	}
echo $html;
?>

<?php
require_once('template/footer.php');
?>

