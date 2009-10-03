<?php
require_once("include/init.php");
$name=$_POST["user_name"];
$query="UPDATE user SET role='1' where username= '%s'";
db_query($query,$name);
//echo $query;
header( "Location: ".SITE_ROOT."/home.php");
?>