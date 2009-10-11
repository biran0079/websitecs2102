<?php
require_once("include/init.php");

$user_name = $_POST['user_name'];
$pwd = $_POST['password'];
$op = $_POST['op'];

if ($op == 'logout'){
		session_start();
		session_destroy();
		header( "Location: ".SITE_ROOT."/home.php?op=logout");
}
if ($op =='login'){
	if (validate_login_user($user_name,$pwd)){
		//redirect to home page
		$uid = $_SESSION['uid'];
		//print_r($_SESSION);  
		//die();
		header( "Location: ".SITE_ROOT."/home.php");
	}
	else{
		header( "Location: ".SITE_ROOT."/home.php?op=login&result=fail");
	}
}
?>