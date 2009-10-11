<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
$role=g_get_user_role();
if($role<2){
	$html='
<h2>Enter user\'s Login ID</h2>
<form action="midman/grant_admin_do.php" method="post"><input type="hidden" value="login"
	name="op">
<table>
	<tr>
		<td>Login ID:</td>
		<td><input type="text" name="user_name"></td>
		<td><input type="submit" value="grant" style="width:50px"></td>
	</tr>
</table>
</form>
';
	echo $html;
	echo g_formatter_list_username_edit_delete();
}else{
	$html='you have no privilage to enter this page';
	echo $html;
}
require_once('template/footer.php');
?>
