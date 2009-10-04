<?php
require_once("../include/init.php");

$c_name=$_POST["c_name"];
$add_by=g_get_login_uid();
$op = $_POST["op"];

if ($op == 'add'){
	$query="INSERT IGNORE INTO categary(c_name, add_by) VALUES ('%s','%d')";
	db_query($query,$c_name,$add_by);
	header( "Location: ".SITE_ROOT."/add_category.php");
}
if ($op =='edit'){
	$c_name_pre = $_POST["c_name_pre"];
	$query="UPDATE category SET c_name = '$c_name' WHERE c_name = '$c_name_pre'";
	db_query($query);
	header( "Location: ".SITE_ROOT."/edit_category.php");
}

?>