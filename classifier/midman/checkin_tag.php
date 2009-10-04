<?php
require_once("../include/init.php");

$add_by=g_get_login_uid();

if ($op == 'add'){
	$t_names=$_POST["t_names"];
	$tags = explode(",", $t_names);
	$num = count($tags);
	$query="insert IGNORE into tag (t_name, add_by) values ";

	for ($i=0; $i <= $num-1; $i++){
		if ($i>0)
		$query.=",";

		$query .= ("('".$tags[$i]."',$add_by)");
		//$result = db_query($query_tag_check,$tags[$i]);
	}
	if ( $num>=1)
	db_query($query);
	//header( "Location: ".SITE_ROOT."/add_tag.php");
}
if ($op =='edit'){
	$t_name = $_POST["t_name"];
	$t_name_pre = $_POST["t_name_pre"];
	$query="UPDATE category SET t_name = '$t_name' WHERE t_name = '$t_name_pre'"
	db_query($query);
	//header( "Location: ".SITE_ROOT."/edit_tag.php");
}

?>