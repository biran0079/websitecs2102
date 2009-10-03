<?php
   require_once("../include/init.php");
   
   
   $nid = $_POST['node_id'];
   $op = $_POST['op'];
   $title = $_POST['title'];
   $url = $_POST['url'];
   $uid = g_get_login_uid();

	if ($op == 'Add'){
		$query_add="INSERT INTO post_node(uid,n_url,n_name,visit_times,date_add,date_update) VALUES(%d,'%s','%s',%d,NOW(),NOW())";
        $result= db_query($query_add,$uid,$url,$title,0);


        if($result) {
        	header( "Location: ".SITE_ROOT."/nodes.php?nid=$nid");
        	print "A new entry has been successfully added.";
        }
        else{
        	print "URL or topic already exists.";
        }
        
		
	}
    else if ($op =='Delete'){
	    $query_delete = "DELETE FROM post_node WHERE nid=%d";
	    $result= db_query($query_delete,$nid);
	    
	    if($result) print "An entry has been successfully deleted.";
        else print "delete action fails";
    }
	else{
		$query_edit = "UPDATE TABLE post_node SET (n_name='%s',n_url='%s',date_update=NOW())";		
	    $result = db_query($query_edit,$title,$url);
	    
	    if($result) print "An entry has been successfully edited.";
        else print "Edit action fails";
				
	}
	    




?>