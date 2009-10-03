<?php
require_once("../include/init.php");

function username_crush($username){
	$query="select * from user where username = '$username'";
	$result=db_query($query);
	if(db_fetch_array($result)){
		return true;
	}else{
		return false;
	}
}
function email_crush($email){
	$query="select * from user where email = '$email'".
	$result=db_query($query);
	if(db_fetch_array($result)){
		return true;
	}else{
		return false;
	}
}


$query="insert into user(username,password,email,register_date,last_update_date) values('%s','%s','%s',NOW(),NOW())";
$username=$_POST["name"];
$password=$_POST["password"];
$email=$_POST["email"];
if(username_crush($username)){
	echo"WARNING: username exists already<br \>";
}else if(email_crush($email)){
	echo"WARNING: email exists already<br \>";
}else{
	db_query($query,$username,$password,$email);
	$uid=db_last_insert_id("user","uid");
	g_check_in_by_userid($uid);
	//echo $uid;
	header( "Location: ".SITE_ROOT."/home.php");
}
?>