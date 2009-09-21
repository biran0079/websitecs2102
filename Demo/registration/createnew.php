<?php

$usrname = $_GET['name'];

$email = $_GET['email'];

$con = mysql_connect("localhost","zhaocong","881213");

mysql_select_db("cs2102", $con);


$sql = " INSERT INTO user (name, email) VALUES ('$usrname','$email')";

mysql_query($sql);

$last_id = mysql_insert_id();

header( "Location: http://localhost/test/index.php?user=".$last_id) ;

?>
