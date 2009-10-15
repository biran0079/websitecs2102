<?php
require_once("include/init.php");

$password=$_POST["password"];
$email=$_POST["email"];
$uid=g_get_login_uid();
$query="UPDATE user SET password='$password',email='$email' where uid='$uid'";
//echo $query;
db_query($query);
header( "Location: ".SITE_ROOT."/home.php");
?>