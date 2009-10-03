<?php
require_once("../include/init.php");

$c_name=$_POST["c_name"];
$add_by=g_get_login_uid();

$query="INSERT IGNORE INTO categary(c_name, add_by) VALUES ('%s','%d')";
db_query($query,$c_name,$add_by);

//header( "Location: ".SITE_ROOT."/category.php");
?>