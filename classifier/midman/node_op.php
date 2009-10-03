<?php
   require_once("../include/init.php");
   
   
   $nid = $_POST['node_id'];
   $op = $_POST['op'];
   $titel = $_POST['title'];
   $url = $_POST['url'];
   $uid = g_get_login_uid();

	if ($op == 'Add'){
		$query_add="INSERT INTO post_node(uid,n_url,n_name,visit_times) VALUES(%d,'%s','%s',%d)";
        $result= db_query($query_add,$uid,$url,$title,0);
        if($result) print "A new entry has been successfully added.";
        else print"add action fails";
        
		//header( "Location: ".SITE_ROOT."/nodes.php?nid=$nid")
	}
    else if ($op =='Delete'){
	    $query_delete = "DELETE FROM post_node WHERE nid=%d";
	    $result= db_query($query_delete,$nid);
    }
	else{
		$query_edit = "UPDATE TABLE post_node SET (n_name='%s',n_url='%s')";		
	    $result = db_query($query_edit,$title,$url);
				
	}
	    




?>