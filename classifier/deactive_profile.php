<?php
require_once("include/init.php");
$role=g_get_user_role;
$uid=$_GET['uid'];
if(role<2){
	$query="DELETE FROM user WHERE uid='$uid'";
	//echo $query;
	db_query($query);
}
header( "Location: ".SITE_ROOT."/home.php");
?>