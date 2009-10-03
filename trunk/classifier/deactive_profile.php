<?php
require_once("include/init.php");
$uid=g_get_login_uid();
g_check_out();

$query="DELETE FROM user WHERE uid='$uid'";
//echo $query;
db_query($query);
header( "Location: ".SITE_ROOT."/home.php");
?>