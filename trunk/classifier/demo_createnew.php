<?php
// for every single file, include this file
require_once("./include/init.php");
$usrname = $_GET['name'];
$password = $_GET['pwd'];
$email = $_GET['email'];

$sql = " INSERT INTO user (username, password, email,role,register_date,last_update_date) ";
$sql.= " VALUES ('%s','%s','%s','1',NOW(),NOW())";

db_query($sql,$usrname,$password,$email);

$last_id = mysql_insert_id();

header( "Location: http://localhost/classifier/demo_registration.php?user=".$last_id) ;

?>
