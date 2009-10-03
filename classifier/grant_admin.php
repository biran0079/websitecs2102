<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
?>
<h2>Enter user's Login ID</h2>
<form action="grant_admin_do.php" method="post"><input type="hidden" value="login"
	name="op">
<table>
	<tr>
		<td>Login ID:</td>
		<td><input type="text" name="user_name"></td>
	</tr>
</table>
</form>
<?php
require_once('template/footer.php');
?>
