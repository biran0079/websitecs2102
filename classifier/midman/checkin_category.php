<?php
require_once("../include/init.php");

$c_name=$_POST["c_name"];
$cid = $_POST["cid"];
$add_by=g_get_login_uid();
$op = $_POST["op"];

if ($op == 'add'){
	$query="INSERT IGNORE INTO category(c_name, add_by) VALUES ('%s','%d')";
	db_query($query,$c_name,$add_by);
	header( "Location: ".SITE_ROOT."/edit_category.php");
}
if ($op =='edit'){
	$c_name_pre = $_POST["c_name_pre"];
	$query="UPDATE category SET c_name = '$c_name' WHERE cid = '$cid'";
	db_query($query);
	header( "Location: ".SITE_ROOT."/edit_category.php");
}
if ($op == 'delete'){
	$query = "UPDATE node_category SET cid = 0 WHERE cid = '$cid'";
	db_query($query);
	$query = "DELETE FROM category WHERE c_name = '$c_name'";
	db_query($query);
	header( "Location: ".SITE_ROOT."/edit_category.php");
}

?>