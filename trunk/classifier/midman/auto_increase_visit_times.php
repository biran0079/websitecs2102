<?php
// automatically increase visit time
require_once("../include/init.php");

$id = $_GET['id'];
$sql = " UPDATE post_node SET visit_times = visit_times+1 WHERE nid=  $id";
$result = db_query($sql);
?>