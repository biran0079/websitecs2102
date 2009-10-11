<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();


$role=g_get_user_role;
if(role<2){
	$html='<h2>Are your sure you want to deactive your user profile?</h2>
<form action="deactive_profile.php?uid=' .$_GET["uid"].' " method="post">
<table>
	<tr>
		<td><input type="submit" value="confirm" style="width: 50px"></td>
	</tr>
</table>
</form>';
}else{
	$html="you are not allowed to delete other's profile";
}

echo $html;
require_once('template/footer.php');
?>
