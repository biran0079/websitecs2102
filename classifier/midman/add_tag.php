<?php
require_once("../include/init.php");

$query="insert IGNORE into tag (t_name, add_by) values ";
$t_names=$_POST["t_names"];
$add_by=g_get_login_uid();
$tags = explode(",", $t_names);

$num = count($tags);

for ($i=0; $i <= $num-1; $i++){
	if ($i>0)
		$query.=",";
		
	$query .= ("('".$tags[$i]."',$add_by)");
	//$result = db_query($query_tag_check,$tags[$i]);
}
if ( $num>=1)
	db_query($query);
//header( "Location: ".SITE_ROOT."/tag.php");
?>
