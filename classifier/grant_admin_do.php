<?php
require_once("include/init.php");
$name=$_POST["username"];
$query="UPDATE user SET role='1' where username=$name";
db_query($query);
?>