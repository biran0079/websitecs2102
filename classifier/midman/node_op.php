<?php
   require_once("./include/init.php");
   require_once('template/header.php');
   
   $nid = $_POST['node_id'];
   $op = $_POST['op'];
   $titel = $_POST['title'];
   $url = $_POST['url'];
   $uid = g_get_login_uid();

   
function op_on_nodes($op,$nid){
	if ($op == 'Add'){
		$query_add="INSERT INTO post_node(uid,n_url,n_name,visit_times) VALUES($uid,$url,$title,0)";
        header( "Location: ".SITE_ROOT."/nodes.php?nid=$nid")
	}
    else if ($op =='Delete'){
	    $query_delete = "DELETE FROM post_node WHERE nid=$nid";
    }
	else{
		$query = "SELECT * FROM post_node WHERE nid='%d'";
	    $result = db_query($query,$nid);
				
	}
	    }

}


?>